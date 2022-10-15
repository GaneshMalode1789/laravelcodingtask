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
        <h2>Product option form</h2>
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
        @if(isset($productOptions) && !empty($productOptions))
        <form method="POST" action="{{route('product-options.update', $option_id)}}">
            @else
            <form method="POST" action="{{route('product-options.store')}}">
                @endif
                @csrf
                <div class="mb-3 mt-3">
                    <label for="email">Product Name:</label>
                    <select class="form-select" id="product_id" name="product_id">
                        <option value="">Select Product Name</option>
                        @if(isset($product) && count($product) > 0)
                        @foreach($product as $key => $value)
                        <option value="{{$value['product_id']}}" {{ old('product_id') == $value['product_id'] ? 'selected' : ''}} @if(isset($productOptions) && $productOptions['product_id']==$value['product_id']){{'selected'}}@endif>{{$value['product_name']}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pwd">Option Name:</label>
                    <input type="text" class="form-control" placeholder="Option Name" id="option_name" name="option_name" value="{{ old('option_name') }}@if(isset($productOptions)){{$productOptions['option_name']}}@endif">
                </div>
                <div class="mb-3">
                    <label for="pwd">Option Price:</label>
                    <input type="number" class="form-control" placeholder="Option Price" id="option_price" name="option_price" value="{{ old('option_price') }}@if(isset($productOptions)){{$productOptions['option_price']}}@endif">
                </div>
                <a href="{{route('product-options.list')}}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>

</body>

</html>