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

    <!-- isset check if a variable already exist and have a value deferent than null-->
    @isset($name)
        <p>la variable name existe</p>
    @endisset
    <!-- empty check if a variable is empty -->
    @empty($cours)
        <p>le tableau cours est vide</p>
    @endempty
    @switch($name)
        @case('amine')
            <p>le nom est amine</p>
            @break
        @case('mohamed')
            <p>le nom est mohamed</p>
            @break
        @default
            <p>le nom est {{$name}}</p>
    @endswitch
    <!-- on utilise @ php instead of <?php ?> !-->
    @php
        $n=10+5;
    @endphp
    <p>le resultat est {{$n}}</p>
</body>
</html>