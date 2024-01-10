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
        

            <ul>
                @foreach ($errors->all() as $error )
                    <li class="alert alert-danger">{{$error}}</li>
                @endforeach
            </ul>

            <div class="col s12">
                    <h1>UPDATE A PRODUCT</h1>
                    <div class="row">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                    <form action="/update_product_traitement" method="POST">
                        @csrf
                        <input type="text" class="form-control" id="id" name="id" value="{{$product->id}}" hidden >
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">
                        </div>
                        <div class="mb-3">
                            <select class="form-select"  name="category_id" id="category">
                                @foreach ($categories as $category)
                                    <option value={{$category->id}}
                                        @if($product->category_id == $category->id) selected @endif>
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/show_products" class="btn btn-primary">product list</a>
                    </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>