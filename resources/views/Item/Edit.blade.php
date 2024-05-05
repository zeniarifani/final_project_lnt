<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "{{ asset('css/background.css') }}">
    <title>PT ChipiChapa</title>
</head>
<body>

    <nav>
        <h1>Admin</h1>
        <ul>
            <li><a><img src="/image/koala.png" alt"" ></a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li> 
            <li><a href="#">Contact Us</a></li>
        </ul>
    </nav>
    <h2 class="centered">Edit Product Information</h2>
    <form class="p-5" method="POST" action="{{route('updateItem',['id'=>$item->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    
    <div class="mb-3">
        <label for="product_name" class="form-label">Product Name</label>
        <input type="name" class="form-control" id="product_name" name="product_name" placeholder="" value="{{$item->product_name}}">
        @error('product_name')
             <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" placeholder="" value="{{$item->price}}">
        @error('price')
             <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" placeholder="" value="{{$item->stock}}">
        @error('stock')
                  <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="product_photo" class="form-label">Insert Product Photo</label>
        <input class="form-control" type="file" name="product_photo" id="product_photo" value="{{$item->product_photo}}">
        @error('product_photo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button class="btn btn-primary" type="submit">Update</button>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>