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
        <h3>Product Options</h3>
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
            <div class="col-10">
                <a href="{{route('product-options.add')}}" class="btn btn-primary">Add Product Option</a>
            </div>
            <div class="col-2">
            <a href="{{route('product.list')}}" class="btn btn-primary float-end">Product List</a>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Option Name</th>
                    <th>Option Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($productOptions) && count($productOptions) > 0)
                @foreach($productOptions as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value['product']['product_name']}}</td>
                    <td>{{$value['option_name']}}</td>
                    <td>{{$value['option_price']}}</td>
                    <td><a href="{{route('product-options.edit', $value['option_id'])}}">Edit</a></td>
                    <td><a href="{{route('product-options.delete', $value['option_id'])}}">Delete</a></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="6">No Data Found</td>
                </tr>
                @endif
            </tbody>
        </table>
        {!! $productOptions->links() !!}
    </div>
</body>

</html>