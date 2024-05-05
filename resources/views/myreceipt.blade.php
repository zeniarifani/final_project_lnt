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
        <h1 class>My receipt</h1>
        <ul>
            <li><a><img src="/image/koala.png" alt"" ></a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li> 
            <li><a href="#">Back To Catalogue</a></li>
        </ul>
    </nav>
          
    <div class="container py-4">

            <table class="table">
                <thead>
                    <tr>
                    <th>No.</th>
                    <th>Product Name</th>
                    <th>Product Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @php $counter = 1; $total_price = 0; @endphp
                    @foreach($cart as $c)
                    <tr>
                        <td>{{$counter}}</td>
                        <td>{{$c->product_name}}</td>
                        <td>{{$c->category->category_name}}</td>
                        <td>Rp.{{$c->price}}</td>
                        <td>{{$c->quantity}}</td>
                    </tr>
                    @php 
                        $counter++; 
                        $total_price += $c->price * $c->quantity;
                    @endphp
                    @endforeach
                </tbody>
           </table>

    </div>

    <div>

        <h1 class="p-5">
            Total : Rp.{{$total_price}}
        </h1>
    </div>



    <form class="p-5" method = "post" action = "{{route('finalOrder')}}">
        @csrf
        <input type="hidden" name="total_price" value="{{ $total_price }}">
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address">
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
             @enderror
        </div>
        <div class="mb-3">
            <label for="postal_code" class="form-label">Postal Code</label>
            <input type="number" class="form-control" id="postal_code" name="postal_code">
            @error('postal_code')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Make Order</button>
    </form>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>