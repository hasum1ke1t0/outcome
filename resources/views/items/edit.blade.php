<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Textbook_deal</title>
    </head>
    <body>
        <h1>編集画面</h1>
        <div class="content">
            <form action="/items/ {{ $item->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="content_title">
                <h2>教科書名</h2>
                <input type="text" name="item[name]" value = "{{ $item->name }}" placeholder="教科書名"/>
                <p class="name__error" style="color:red">{{ $errors->first('item.name') }}</p>
            </div>
            <div class = "content_course">
                <h2>授業名</h2>
                <input type="text" name="item[course]"  value = "{{ $item->course }}"  placeholder="教科名"/>
                <p class="course__error" style="color:red">{{ $errors->first('item.course') }}</p>
            </div>
            <div class = "content_create_year">
                <h2>出版年</h2>
                <input type="text" name="item[create_year]" value = "{{ $item->create_year }}"  placeholder="出版年"/>
                <p class="create_year__error" style="color:red">{{ $errors->first('item.create_year') }}</p>
            </div>
            <div class = "image">
                <h2>画像URL</h2>
                <textarea name="item[image]"  placeholder="画像URL">{{ $item->image }}</textarea>
            </div>
            <div class="body">
                <h2>詳細</h2>
                <textarea name="item[body]" placeholder="教科書の状態など、なるべく詳しく書いてください">{{ $item->body }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('item.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>