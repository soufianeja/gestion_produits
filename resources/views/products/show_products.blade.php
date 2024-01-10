<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>ECOM</title>
</head>
<body>


    
    
    <div class="container text-center">
            <div class="col s12">
                <h1>PRODUCT LIST</h1>
                <div class="row">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                    
                    <table class="table table-striped-columns">
                        <thead>
                            <tr class="table-active">
                                <th>id</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product )
                            <tr class="table-active">
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}} Dh</td>
                                <td>{{$product->category->name}}</td>
                                <td>
                                    <a href="/update_product/{{$product->id}}" class="btn btn-info">Update</a>
                                    <a href="/delete_product/{{$product->id}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                    {{-- {{$->links()}} --}}
                    </div>
            </div>
        </div>

        <div class="row">
            <div class="mb-3">
                <a href="/add_category" class="btn btn-primary">add category</a>
            </div>
            <div class="mb-3">
                <a href="/add_product" class="btn btn-primary">add product</a>
            </div>
        </div>
        
        <div class="row">
            @foreach ($categories as $category )
            <div class="mb-3">
                <a href="/show_products_per_cat/{{$category->id}}" class="btn btn-primary">{{$category->name}}</a>
            </div>
            @endforeach
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>