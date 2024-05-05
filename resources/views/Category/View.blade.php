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
        <h1>Admin</h1>
        <ul>
            <li><a><img src="/image/koala.png" alt"" ></a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li> 
            <li><a href="#">Contact Us</a></li>
        </ul>
    </nav>
    <h2 class="centered">CategoryList</h2>
      @forelse ($category as $i)
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            <div class="col-md-10">
                <div class="card" style="width:18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$i->category_name}} </h5>
                        <div>
                            <form method = "POST" action="{{route('delete_category',['id'=>$i->id])}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    Delete Data
                                </button>
                            </form>
                        </div>
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
</html>