<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>教科書詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
        <div class="flex bg-white w-1/2 shadow-md rounded p-4 mb-4">
            <div class="flex-auto w-64">
                <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                    {{ $item->name }}
                </h1>
                <div class="">
                    <div class="content_item">
                        <h3 class="text-2xl font-bold text-gray-900 sm:text-xl">授業名</h3>
                        <p >{{ $item->course }}</p>
                        <h3 class="text-2xl font-bold text-gray-900 sm:text-xl">出版年</h3>
                        <p class='course'>{{ $item->create_year }}年</p>
                        <h3 class="text-2xl font-bold text-gray-900 sm:text-xl">大学</h3>
                        <p >{{ $item->user->school }}</p>
                        <h3 class="text-2xl font-bold text-gray-900 sm:text-xl">教科書詳細</h3>
                        <p>{{ $item->body }}</p>
                        @if($item->user_id == Auth::id())
                            <a class="group relative inline-flex items-center overflow-hidden rounded bg-indigo-600 px-8 py-3 text-white focus:outline-none focus:ring active:bg-indigo-500" href="/items/{{ $item->id }}/edit">
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
                                    編集する
                                  </span>
                            </a>
                            @endif
                            
                            @if($item->user_id != Auth::id())
                            <form action="/deals/{{ $item->id }}" id="form_{{ $item->id }}" method="post">
                                @csrf
                                <button type="button" onclick="buyItem({{ $item->id }})" class="group relative inline-flex items-center overflow-hidden rounded bg-green-600 px-8 py-3 text-white focus:outline-none focus:ring active:bg-green-500">
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
                                    購入する
                                  </span>
                                </button> 
                            </form>
                            @endif
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
                                          戻る
                                      </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class ="flex-auto w-64">
                <div class="">
                    <img src="{{ $item->image }}" class="w-64 h-auto" alt="画像が読み込めません。"/>
                </div>
            </div>
        </div>
        </x-app-layout>
        <script>
            function buyItem(id) {
                'use strict'
                                    
                if (confirm('こちらの教科書を取引します。\nよろしいですか？')) {
                    document.getElementById(`form_${id}`).submit();
                        }
                    }
        </script>
        
    </body>
</html>