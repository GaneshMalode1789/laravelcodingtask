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
    <div class="container mt-3">
        <h2>Product form</h2>
        @if(session()->has('error'))
        <div class="alert alert-success text-center">
            {{ session()->get('error') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(isset($products) && !empty($products))
        <form method="POST" action="{{route('product.update', $product_id)}}">
            @else
            <form method="POST" action="{{route('product.store')}}">
                @endif
                @csrf
                <div class="mb-3 mt-3">
                    <label for="email">Category Name:</label>
                    <select class="form-select" id="cat_id" name="cat_id">
                        @if(isset($category) && count($category) > 0)
                        @foreach($category as $key => $value)
                        <option value="{{$value['cat_id']}}" {{ old('cat_id') == $value['cat_id'] ? 'selected' : ''}} @if(isset($products) && $products['cat_id']==$value['cat_id']){{'selected'}}@endif>{{$value['cat_name']}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pwd">Sub Category Name:</label>
                    <select class="form-select" id="sub_cat_id" name="sub_cat_id">
                        @if(isset($subcategory) && count($subcategory) > 0)
                        @foreach($subcategory as $key => $value)
                        <option value="{{$value['sub_cat_id']}}" {{ old('sub_cat_id') == $value['sub_cat_id'] ? 'selected' : ''}} @if(isset($products) && $products['sub_cat_id']==$value['sub_cat_id']){{'selected'}}@endif>{{$value['sub_cat_name']}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pwd">Product Name:</label>
                    <input type="text" class="form-control" placeholder="Product Name" id="product_name" name="product_name" value="{{ old('product_name') }}@if(isset($products)){{$products['product_name']}}@endif">
                </div>
                <div class="mb-3">
                    <label for="pwd">Product Description:</label>
                    <textarea class="form-control" placeholder="Product Description" id="product_description" name="product_description">{{ old('product_description') }}@if(isset($products)){{$products['product_description']}}@endif</textarea>
                </div>
                <div class="mb-3">
                    <label for="pwd">Product Code:</label>
                    <input type="text" class="form-control" placeholder="Product Code" id="product_code" name="product_code" value="{{ old('product_code') }}@if(isset($products)){{$products['product_code']}}@endif">
                </div>

                <div class="mb-3">
                    <label for="pwd">Product Url:</label>
                    <input type="text" class="form-control" placeholder="Product Url" id="product_url" name="product_url" value="{{ old('product_url') }}@if(isset($products)){{$products['product_url']}}@endif">
                </div>
                <div class="form-check mb-3">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" id="product_status" name="product_status" {{ old('product_status') == 'on' ? 'checked' : '' }}@if(isset($products) && $products['product_status']==1) checked @endif> Product Status
                    </label>
                </div>
                <a href="{{route('product.list')}}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>

</body>

</html>