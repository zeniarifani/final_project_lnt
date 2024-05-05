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
    <h2 class="centered">New Supplier</h2>
    <form class="p-5" method="POST" action="{{route('add_supplier',['id'=>$item->id])}}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select class="form-select" name="supplier" aria-label="Default select example">
                <option value="" disabled>Select a Supplier</option>
                @foreach ($suppliers as $s)
                    <option value="{{ $s->id }}">{{ $s->supplier_name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary" type="submit">Submit</button>
    <form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>