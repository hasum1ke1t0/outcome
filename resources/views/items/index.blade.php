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
        <h1>教科書一覧</h1>
        <div class='items'>
        <a href= '/items/create'>出品</a>
        <a href= '/deals'>取引</a>
            @foreach ($items as $item)
                <div class='item'>
                    <h2 class='title'>
                        <a href="/items/{{ $item->id }}">{{ $item->name }}</a>
                    </h2>
                    <p class='course'>授業名:{{ $item->course }}</p>
                    <p class='create_year'>出版年:{{ $item->create_year}}年</p>
                </div>
                @if($item->user_id == Auth::id())
                <form action="/items/{{ $item->id }}" id="form_{{ $item->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteItem({{ $item->id }})">delete</button> 
                </form>
                @endif
            @endforeach
        </div>
        <div class='paginate'>
            {{ $items->links() }}
        </div>
        <script>
            function deleteItem(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </x-app-layout>
    </body>
</html>