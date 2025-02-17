<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>social network | {{$title}}</title>
</head>
<body>
    @include('partials.nav')
    <main>
        <div class="container">
            @include('partials.flashbag')
            {{ $slot }}
        </div>
    </main>
    @include('partials.footer')
   
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvvHXELVSxUe5Y6n2I" crossorigin="anonymous"></script>
<!-- Include Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJTY2dfBhiNv23j6MlHZkO9ABP4jY7n6l7k9WuYA8CNhZb0d5" crossorigin="anonymous"></script>
<!-- Include Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



</body>
</html>



