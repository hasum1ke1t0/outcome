<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Textbook_Deal</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Textbook</h1>
        <div class='items'>
            @foreach ($items as $item)
                <div class='item'>
                    <h2 class='title'>{{ $item->name }}</h2>
                    <p class='course'>{{ $item->course }}</p>
                    <p class='create_year'>{{ $item->create_year}}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $items->links() }}
        </div>
    </body>
</html>