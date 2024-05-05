<!-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PT ChipiChapa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "{{ asset('css/background.css') }}">
    <title>PT ChipiChapa</title>
</head>

<body>
    <nav>
        <h1>{{$name}}</h1>
        <ul>
            <li><a><img src="/image/koala.png" alt"" ></a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">My Cart</a></li>
            <form method="post" action="{{route('logout')}}">
                @csrf
                <button type="submit" class="btn btn-danger">Log Out</button>
            </form>
        </ul>
    </nav>
    <h2 class="centered">Catalogue</h2>
@forelse ($items as $i)
  <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <div class="col-md-10">
          <div class="card" style="width:18rem;">
              @if ($i->product_photo)
              <img src="{{Storage::url('public/product_photo/' . $i->product_photo)}}" class="card-img-top" alt="...">
              @else
              <p>No image inserted.</p>
              @endif
              <div class="card-body">
                  <h5 class="card-title">{{$i->product_name}} </h5>
                  <p class="card-text">Category: {{$i->category->category_name}}</p>
              
                  @if (!is_null($i->supplier))
                      @foreach($i->supplier as $s)
                          <p class="card-text">Supplier: {{$s->supplier_name}}</p>
                      @endforeach
                  @endif

                  <p class="card-text">Price: Rp.{{$i->price}}</p>
                  <p class="card-text">Stock: {{$i->stock}}</p>
              </div>
          </div>
      </div>
      @empty
      <div class="row justify-content-center">
          <div class="col-md-6">
              <div class="alert alert-warning" role="alert">
                  No data.
              </div>
          </div>
      </div>
      @endforelse
  </div> 
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html> -->



<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT ChipiChapa</title>
</head>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "{{ asset('css/background.css') }}">
    <title>PT ChipiChapa</title>
</head>

<body>

    <nav>
        <h1>{{$name}}</h1>
        <ul>
            <li><a><img src="/image/koala.png" alt"" ></a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li> 
            <li><a href="{{url('myreceipt')}}">My Cart</a></li>
        </ul>
    </nav>
    <h2 class="centered">Catalogue</h2>

      @forelse ($items as $i)
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            <div class="col-md-10">
                <div class="card" style="width:18rem;">
                    @if ($i->product_photo)
                    <img src="{{Storage::url('public/product_photo/' . $i->product_photo)}}" class="card-img-top" alt="...">
                    @else
                    <p>No image inserted.</p>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$i->product_name}} </h5>
                        <p class="card-text">Category: {{$i->category->category_name}}</p>
                    
                        @if (!is_null($i->supplier))
                            @foreach($i->supplier as $s)
                                <p class="card-text">Supplier: {{$s->supplier_name}}</p>
                            @endforeach
                        @endif

                        <p class="card-text">Price: Rp.{{$i->price}}</p>
                        <p class="card-text">Stock: {{$i->stock}}</p>
                        <div>
                            <form action = "{{url('add_cart',$i->id)}}" class = "option1" method="post">
                                @csrf
                                <div class = "row">
                                    <div class = "col-md-4">
                                        <input type="number" name="quantity" value="1" min="1">
                                    </div>
                                    <div class = "col-md-4">
                                        <input type = "submit" value="Add to Cart">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="alert alert-warning" role="alert">
                        Sorry but we haven't restocked yet.
                    </div>
                </div>
            </div>
            @endforelse
        </div> 
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>