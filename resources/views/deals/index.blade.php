<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Textbook_Deal</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
        <h1>取引一覧</h1>
        <div class='deals'>
            @foreach ($deals as $deal)
                <div class='deal'>
                    <h2 class='title'>
                        <a href="/deals/{{ $deal->id }}">{{ $deal->item->name }}</a>
                    </h2>
                    <p class = "created_at">取引日時: {{$deal->created_at}}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $deals->links() }}
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </x-app-layout>
    </body>
</html>