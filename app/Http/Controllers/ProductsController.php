<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function list(Request $request) {
        $products = Product::with('category','subcategory')->paginate(10);
        return view('products.list', compact('products'));
    }
    public function add() {
        $category = Category::get()->toArray();
        $subcategory = SubCategory::get()->toArray();
        return view('products.index', compact('category','subcategory'));
    }
    public function store(Request $request) {
        $data = $request->all();
        // product_id, cat_id, sub_cat_id, product_name, product_description, product_code, product_url, product_status
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $request->validate([
            'cat_id' => 'required',
            'sub_cat_id' => 'required',
            'product_name' => 'required',
            'product_description' => 'required',
            'product_code' => 'required',
            'product_url' => 'required|regex:'.$regex,
        ]);
        $data['product_status'] = $request->input('product_status') == 'on' ? 1 : 0;
        $result = Product::create($data);
        if($result) {
            return redirect("product\list")->with('success', 'Product added successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function edit($product_id) {
        $category = Category::get()->toArray();
        $subcategory = SubCategory::get()->toArray();
        $products = Product::where('product_id', $product_id)->first()->toArray();
        return view('products.index', compact('products','category','subcategory','product_id'));
    }
    public function update($product_id, Request $request) {
        $data = $request->all();
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $request->validate([
            'cat_id' => 'required',
            'sub_cat_id' => 'required',
            'product_name' => 'required',
            'product_description' => 'required',
            'product_code' => 'required',
            'product_url' => 'required|regex:'.$regex,
        ]);
        $data['product_status'] = $request->input('product_status') == 'on' ? 1 : 0;
        unset($data['_token']);
        $result = Product::where('product_id', $product_id)->update($data);
        if($result) {
            return redirect("product/list")->with('success', 'Product updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function delete($product_id) {
        $result = Product::where('product_id', $product_id)->delete();
        if($result) {
            return redirect("product\list")->with('success', 'Product deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function search($search) {
        if(!empty($search)) {
            $products = Product::with('category','subcategory')->where('product_name', 'like', '%'.$search.'%')->paginate(2);
            return view('products.list', compact('products', 'search'));
        } else {
            return redirect("product\list");
        }
    }
}
