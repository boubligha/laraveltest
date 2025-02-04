<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>welcome {{$name}}</h1>
    <ul>
        @foreach($cours as $value)
            <li> {{$value}}</li>
        @endforeach
    </ul>
    @if(count($cours) > 0)
        <table border="1" width="100%">
            <tr>
                <th>Cours</th>
            </tr>
            @foreach($cours as $value)
                <tr>
                    <td>{{$value}}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>pas de cours</p>
    @endif

    <!-- unless conbtraire de if -->
    @unless(count($cours) > 0)
        <p>pas de cours</p>
    @else
        <table border="1" width="100%">
            <tr>
                <th>Cours</th>
            </tr>
            @foreach($cours as $value)
                <tr>
                    <td>{{$value}}</td>
                </tr>
            @endforeach
        </table>
    @endunless
</body>
</html>