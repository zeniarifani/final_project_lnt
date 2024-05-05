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
        <h1 class>My Final Order</h1>
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
                <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @php $counter = 1; $total_price = 0; @endphp
                @foreach($receipt as $c)
                <tr>
                    <td>{{$counter}}</td>
                    <td>{{$c->product_name}}</td>
                    <td>{{$c->quantity}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        </div>

        <div>
        <h1 class="p-5">
            Total : Rp.{{$c->total_price}}
        </h1>
        <h1 class="p-5">
            Address: {{$c->address}}
        </h1>
        <h1 class="p-5">
            Postal Code: {{$c->postal_code}}
        </h1>
    </div>
          
    
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>