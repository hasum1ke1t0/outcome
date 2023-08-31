<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>検索</title>
        <!-- Fonts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
        <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">検索結果🔍</h1>
            <p class="mt-1.5 text-sm text-gray-500">
              こちらの機能は現在準備中です。
            </p>
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
        </x-app-layout>
    </body>
</html>