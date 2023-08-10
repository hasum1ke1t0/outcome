<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>記事詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
        <h1 class="title">
            {{ $item->name }}
        </h1>
        <div class="content">
            <div class="content__item">
                <h3>授業名</h3>
                <p class='course'>{{ $item->course }}</p>
                <h3>出版年</h3>
                <p class='course'>{{ $item->create_year }}年</p>
                <h3>教科書詳細</h3>
                <p>{{ $item->body }}</p>
                
            </div>
            <div>
                <img src="{{ $item->image }}" alt="画像が読み込めません。"/>
            </div>
        </div>
        @if($item->user_id == Auth::id())
        <div class="edit"><a href="/items/{{ $item->id }}/edit">編集する</a></div>
        @endif
        
        @if($item->user_id != Auth::id())
        <form action="/deals/{{ $item->id }}" id="form_{{ $item->id }}" method="post">
            @csrf
            <button type="button" onclick="buyItem({{ $item->id }})">購入する</button> 
            <script>
                function buyItem(id) {
                    'use strict'
                    
                    if (confirm('こちらの教科書を取引します。\nよろしいですか？')) {
                            document.getElementById(`form_${id}`).submit();
                        }
                    }
            </script>
        </form>
        @endif
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        </x-app-layout>
    </body>
</html>