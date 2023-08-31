<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>出品</title>
    </head>
    <body>
        <x-app-layout>
        <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">出品📚</h1>
            <p class="mt-1.5 text-sm text-gray-500">
              使わなくなった教科書を出品しましょう。 🎉
            </p>
        <form action="/items" method="POST" enctype="multipart/form-data" class="bg-white w-1/2 shadow-md rounded p-4 mb-4">
            @csrf
            <div class="title">
                <h2 class="block text-sm font-medium text-gray-700">教科書名</h2>
                <input type="text" class="mt-2 w-1/3 rounded-lg border-gray-200 align-top shadow-sm sm:text-sm" name="item[name]" placeholder="教科書名"/>
                <p class="name__error" style="color:red">{{ $errors->first('item.name') }}</p>
            </div>
            <div class = "course">
                <h2 class="block text-sm font-medium text-gray-700">授業名</h2>
                <input type="text" class="mt-2 w-1/3 rounded-lg border-gray-200 align-top shadow-sm sm:text-sm" name="item[course]" placeholder="教科名"/>
                <p class="course__error" style="color:red">{{ $errors->first('item.course') }}</p>
            </div>
            <div class = "create_year">
                <h2 class="block text-sm font-medium text-gray-700">出版年</h2>
                    <input type="text" class="mt-2 w-1/3 rounded-lg border-gray-200 align-top shadow-sm sm:text-sm" name="item[create_year]" placeholder="出版年"/>
                    <p class="create_year__error" style="color:red">{{ $errors->first('item.create_year') }}</p>
            </div>
            <div class = "image">
                <h2 class="block text-sm font-medium text-gray-700">教科書画像</h2>
                <p class="mt-1.5 text-sm text-red-500">画像は出品後、変更できません！</p>
                <input type="file" name="image">
            </div>
            <div class="body">
                <h2 class="block text-sm font-medium text-gray-700">詳細</h2>
                <textarea name="item[body]" class="mt-2 w-2/3 rounded-lg border-gray-200 align-top shadow-sm sm:text-sm" rows="4" placeholder="教科書の状態など、なるべく詳しく書いてください"></textarea>
                <p class="body__error" style="color:red">{{ $errors->first('item.body') }}</p>
            </div>
            <button type="submit" class="group relative inline-flex items-center overflow-hidden rounded bg-green-600 px-8 py-3 text-white focus:outline-none focus:ring active:bg-green-500">
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
                        出品
                      </span>
            </button>
        </form>
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