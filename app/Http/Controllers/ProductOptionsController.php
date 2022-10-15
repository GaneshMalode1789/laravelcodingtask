<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductOption;
use Illuminate\Http\Request;

class ProductOptionsController extends Controller
{
    public function list(Request $request) {
        $productOptions = ProductOption::with('product')->paginate(10);
        return view('product-options.list', compact('productOptions'));
    }
    public function add() {
        $product = Product::get()->toArray();        
        return view('product-options.index', compact('product'));
    }
    public function store(Request $request) {
        $data = $request->all();
        // product_id, option_name, option_price
        $request->validate([
            'product_id' => 'required',
            'option_name' => 'required',
            'option_price' => 'required|numeric'
        ]);
        $result = ProductOption::create($data);
        if($result) {
            return redirect("product-options\list")->with('success', 'Product option added successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function edit($option_id) {
        $product = Product::get()->toArray();
        $productOptions = ProductOption::where('option_id', $option_id)->first()->toArray();
        return view('product-options.index', compact('product','productOptions','option_id'));
    }
    public function update($option_id, Request $request) {
        $data = $request->all();
        $request->validate([
            'product_id' => 'required',
            'option_name' => 'required',
            'option_price' => 'required|numeric'
        ]);
        unset($data['_token']);
        $result = ProductOption::where('option_id', $option_id)->update($data);
        if($result) {
            return redirect("product-options\list")->with('success', 'Product option updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function delete($option_id) {
        $result = ProductOption::where('option_id', $option_id)->delete();
        if($result) {
            return redirect("product-options\list")->with('success', 'Product option deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
