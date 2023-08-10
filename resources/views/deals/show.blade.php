<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>取引</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
        <h1 class="title">
            {{ $deal->item->name }}
        </h1>
        <div class="content">
            <div class="content__item">
                <h3>授業名</h3>
                <p class='course'>{{ $deal->item->course }}</p>
                <h3>出版年</h3>
                <p class='course'>{{ $deal->item->create_year }}年</p>
                <h3>教科書詳細</h3>
                <p>{{ $deal->item->body }}</p>
            </div>
        </div>
        <div class="footer">
            <a href="/deals">戻る</a>
        </div>
        </x-app-layout>
    </body>
</html>