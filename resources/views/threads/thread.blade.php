<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('新規スレッド作成画面') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <x-flash-message status="info" />
            {{--新規スレッド作成--}}
            <div class="mb-9 max-w-3xl mx-auto bg-white overflow-hidden rounded-xl border border-slate-300">
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

            {{--スレッド一覧--}}
            @foreach ( $threads as $thread )
                <div class="mb-9 max-w-3xl mx-auto bg-white overflow-hidden rounded-xl border border-slate-300">
                    <div class="bg-zinc-100 py-4 px-10 text-left text-lg font-bold">
                        <label class="">{{ $thread->thread_title }}</label>
                    </div>
                    @foreach ( $thread->message as $message )
                        <div class="px-5 py-2.5">
                            <h5 class="my-1">名前：ここになまえが入る：{{ $message->created_at }}</h5>
                            <p>{{ $message->body }}</p>
                        </div>
                    @endforeach
                    <div class="bg-zinc-100">
                        <form method="post" action="">
                            @csrf
                            <div class="w-11/12 m-auto py-3 ">
                                <label class="block mb-1.5">内容</label>
                                <textarea class="w-full rounded-xl border border-slate-400" name="body" id="" cols="30" rows="10"></textarea>
                                <button type="submit" class="my-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">書き込む</button>
                            </div>

                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
