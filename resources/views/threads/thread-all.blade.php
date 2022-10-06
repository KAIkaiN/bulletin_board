<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('新規スレッド作成画面') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            {{--スレッド一覧--}}
            @foreach ( $threads as $thread )
                <div class="mb-9 max-w-3xl mx-auto bg-white overflow-hidden rounded-xl border border-slate-300">
                    <div class="bg-zinc-100 py-4 px-10 text-left text-lg font-bold">
                        <a class="text-center text-sm text-white mb-1 rounded p-1 w-14 block bg-blue-500 hover:bg-blue-700"
                        href="{{ route('user.threads.show',$thread->id) }}">{{ $thread->id }}レス</a>
                        <label class="">{{ $thread->thread_title }}</label>
                    </div>
                    @foreach ( $thread->message as $message )
                        <div class="px-7 py-2.5">
                            <h5 class="my-1">{{ $message->user->name }}：{{ $message->created_at }}</h5>
                            <p>{{ $message->body }}</p>
                        </div>
                    @endforeach
                    <div class="bg-zinc-100">
                        <form method="post" action="{{ route('user.message.store',$thread->id) }}">
                            @csrf
                            <div class="w-11/12 m-auto py-3 ">
                                <label class="block mb-1.5">内容</label>
                                <textarea name="body"
                                class="w-full rounded-xl border border-slate-400" id="" cols="30" rows="10"></textarea>
                                <button type="submit" class="my-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">書き込む</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
