<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-fluid mt-3">
        <h3>Products</h3>
        @if(session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session()->get('success') }}
        </div>
        @endif
        @if(session()->has('error'))
        <div class="alert alert-success text-center">
            {{ session()->get('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-6">
                <a href="{{route('product.add')}}" class="btn btn-primary">Add Product</a>
            </div>
            <div class="col-2">
                <input type="text" class="form-control" id="search" name="search" placeholder="Search" value="@if(isset($search)){{$search}}@endif">
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-primary" onclick="getProducts()">Search</button>
            </div>
            <div class="col-2">
                <a href="{{route('product-options.list')}}" class="btn btn-primary float-end">Product Options List</a>
            </div>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Category Name</th>
                    <th>Subcategory Name</th>
                    <th>Product Description</th>
                    <th>Product Code</th>
                    <th>Product Url</th>
                    <th>Product Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($products) && count($products) > 0)
                @foreach($products as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value['product_name']}}</td>
                    <td>{{$value['category']['cat_name']}}</td>
                    <td>{{$value['subcategory']['sub_cat_name']}}</td>
                    <td>{{$value['product_description']}}</td>
                    <td>{{$value['product_code']}}</td>
                    <td><a href="{{$value['product_url']}}" target="_blank">{{$value['product_url']}}</a></td>
                    <td>{{$value['product_status'] == 1 ? 'Active' : 'Inactive'}}</td>
                    <td><a href="{{route('product.edit', $value['product_id'])}}">Edit</a></td>
                    <td><a href="{{route('product.delete', $value['product_id'])}}">Delete</a></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="10">No Data Found</td>
                </tr>
                @endif
            </tbody>
        </table>
        {!! $products->links() !!}
    </div>
    <script>
        function getProducts() {
            var search = document.getElementById("search").value.trim();
            console.log(search);
            if (search != '') {
                window.location.href = '{{url("product/search")}}/' + search;
            } else {
                window.location.href = '{{url("product/list")}}';
            }
        }
    </script>
</body>

</html>