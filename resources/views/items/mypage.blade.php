<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>マイページ</title>
        <!-- Fonts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
        <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">マイページ👤</h1>
            <p class="mt-1.5 text-sm text-gray-500">
              あなたの出品した商品を確認できます。
            </p>
        <div class='items'>
          <div class = "bg-white shadow-md rounded p-4 mb-4 items-center justify-center gap-1">
          <div class ="grid grid-cols-3 gap-6 justify-center mx-4">
            @foreach ($items as $item)
            <form class = "bg-white shadow-md rounded p-4 mb-4">
                    <h2 class='title'>
                        <a class="text-2xl font-bold text-gray-900 sm:text-2xl">
                            {{ $item->name }}
                        </a>
                    </h2>
                    <p class='course'>授業名:{{ $item->course }}</p>
                    <p class='create_year'>出版年:{{ $item->create_year}}年</p>
                    <p class='school'>大学:{{ $item->user->school}}</p>
                <div class="text-center">
                <a href="/items/{{ $item->id }}"  class="group relative inline-flex items-center overflow-hidden rounded bg-indigo-600 px-8 py-3 text-white focus:outline-none focus:ring active:bg-indigo-500" href= '/items/create'>
                    <span class="absolute -end-full transition-all group-hover:end-4">
                        <svg
                          class="h-5 w-5 rtl:rotate-180"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"
                          />
                        </svg>
                      </span>
                    
                      <span class="text-sm font-medium transition-all group-hover:me-4">
                        詳細
                      </span>
                    </a>
                @if($item->user_id == Auth::id())
                <form action="/items/{{ $item->id }}" id="form_{{ $item->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteItem({{ $item->id }})" class="group relative inline-flex items-center overflow-hidden rounded bg-red-600 px-8 py-3 text-white focus:outline-none focus:ring active:bg-red-500">
                       <span class="absolute -end-full transition-all group-hover:end-4"> 
                            <svg
                              class="h-5 w-5 rtl:rotate-180"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                            >
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"
                              />
                            </svg>
                      </span>
                      <span class="text-sm font-medium transition-all group-hover:me-4">
                        削除
                      </span>
                    </button> 
                </form>
                @endif
                </div>
              </form>
            @endforeach
            </div>
            <div class='paginate'>
                {{ $items->links() }}
            </div>
          </div>
        </div>
        <div class="back">
            
            <a href="/" style="margin-right: 6px;" class="group relative inline-flex items-center overflow-hidden rounded bg-gray-600 px-6 py-2 text-white focus:outline-none focus:ring active:bg-gray-500">
                       <span class="absolute -start-full transition-all group-hover:start-1"> 
                            <svg
                              class="h-5 w-5 ltr:rotate-180"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                            >
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M7 16l-4-4m0 0l4-4m-4 4h18"
                              />
                            </svg>
                      </span>
                      <span class="text-sm font-medium transition-all group-hover:ms-4">
                          トップ
                      </span>
            </a>
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