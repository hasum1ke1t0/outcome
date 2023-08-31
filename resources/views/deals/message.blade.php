<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ダイレクトメッセージ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
        <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">ダイレクトメッセージ✉</h1>
        <p class="mt-1.5 text-sm text-gray-500">
             メッセージを送り合い、円滑な取引を行いましょう。
        </p>
        <div class='messages'>
            <div class = "bg-white w-1/2 shadow-md rounded p-4 mb-4 items-center justify-center gap-1">
                <div class ="gap-6 justify-center mx-4">
                    @foreach ($messages as $message)
                        <form class = "bg-white shadow-md rounded p-4 mb-4">
                            <h2 class='title'>
                                <p class = "text-xl font-bold">{{$message->body}}</p>
                            </h2>
                            @if($message->send_id == Auth::id())
                                <p class = "send_user">送り人: 自分</p>
                            @else
                                <p class = "send_user">送り人: 相手</p>
                            @endif
                                <p class = "created_at">投稿日時: {{$message->created_at}}</p>
                        </form>
                    @endforeach
                </div>
                <div class='paginate'>
                    {{ $messages->links() }}
                </div>
                <form action="/deals/{{ $deal->id }}/messages" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="title">
                    <h2 class = "block text-sm font-medium text-gray-700">メッセージ</h2>
                    <div class = "flex gap-5">
                        <input type="text" name="message[body]" class=" flex-1 mt-2 rounded-lg border-gray-200 align-top shadow-sm sm:text-sm" placeholder="取引を円滑に進めるために、メッセージを送りましょう。"/>
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
                                    送信
                                  </span>
                        </button>
                    </div>
                    <p class="name__error" style="color:red">{{ $errors->first('message.body') }}</p>
                </div>
                
            </form>
            </div>
        </div>
        @if($deal->purchased_id == Auth::id())
            <form action="/deals/{{ $deal->id }}" id="form_{{ $deal->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteDeal({{ $deal->id }})" class="group relative inline-flex items-center overflow-hidden rounded bg-black px-8 py-3 text-white focus:outline-none focus:ring active:bg-gray-800">
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
                            取引完了
                          </span>
                        </button> 
            </form>
        @endif
        <div class="back">
            
            <a href="/deals/{{ $deal->id }}" style="margin-right: 6px;" class="group relative inline-flex items-center overflow-hidden rounded bg-gray-600 px-6 py-2 text-white focus:outline-none focus:ring active:bg-gray-500">
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
        <script>;
            function deleteDeal(id) {
                'use strict'
        
                if (confirm('取引が完了した場合、こちらのボタンを押してください。\nメッセージフォームは削除されます。')) {
                    document.getElementById(`form_${id}`).submit()
                }
            }
        </script>
        
    </x-app-layout>
    </body>
</html>