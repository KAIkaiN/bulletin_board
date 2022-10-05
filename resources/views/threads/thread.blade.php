<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('新規スレッド作成画面') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-flash-message status="info" />
            <div class="mb-9 max-w-xl mx-auto bg-white overflow-hidden rounded-xl border border-slate-300">
                <x-auth-validation-errors class="mb-4 px-3.5 pt-3.5" :errors="$errors" />
                <h5 class="card-header bg-gray-300 py-4 px-10 text-left text-lg font-bold text-gray-50">新規スレッド作成</h5>
                <form method="post" action="{{ route('user.threads.store') }}" class="grid grid-cols-1 gap-6 m-10">
                    @csrf
                    <label class="block">
                      <span class="text-gray-700">スレッドタイトル</span>
                      <input name="threadTitle" type="text"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="タイトル">
                    </label>
                    <label class="block">
                      <span class="text-gray-700">内容</span>
                      <textarea name="content"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        rows="3"></textarea>
                    </label>
                    <div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">スレッド作成</button>
                    </div>
                  </form>
            </div>

            {{-- 投稿 --}}
            @foreach ( $threads as $thread )
                <div class="bg-white rounded-md mt-1 mb-5 p-3">
                    {{-- スレッド --}}
                    <div>
                        <p class="mb-2 text-xs">{{ $thread->created_at }}</p>
                        <p class="mb-2 text-xl font-bold">{{ $thread->thread_title }}について</p>
                        @foreach ( $thread->message as $message )
                            <p class="mb-2">{{ $message->body }}</p>
                        @endforeach
                    </div>
                    {{-- 削除ボタン --}}
                    <form class="flex justify-end mt-5" action="/" method="POST">
                        @csrf
                        <input class="border rounded px-2 flex-auto" type="text" name="reply_message">
                        <input class="px-2 py-1 ml-2 rounded bg-green-600 text-white font-bold link-hover cursor-pointer" type="submit" value="返信">
                        <input class="px-2 py-1 ml-2 rounded bg-red-500 text-white font-bold link-hover cursor-pointer" type="submit" value="削除">
                    </form>
                    {{-- 返信 --}}
                    <hr class="mt-2 m-auto">
                    <div class="flex justify-end">
                        <div class="w-11/12">
                            <div>
                                <p class="mt-2 text-xs">2021/11/20 19:00 ＠Noname</p>
                                <p class="my-2 text-sm">これは返信です。これは返信です。これは返信です。これは返信です。これは返信です。これは返信です。これは返信です。これは返信です。これは返信です。</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
