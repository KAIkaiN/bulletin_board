<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('スレッド一覧画面') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            {{--スレッド一覧--}}
            @foreach ( $threads as $thread )
                <div class="mb-9 max-w-3xl mx-auto bg-white overflow-hidden rounded-xl border border-slate-300">
                    <div class="bg-zinc-100 py-4 px-10 text-left text-lg font-bold">
                        @if(Auth::guard('admin')->check())
                            <a class="text-center text-sm text-white mb-1 rounded p-1 w-14 block bg-blue-500 hover:bg-blue-700"
                            href="{{ route('admin.threads.show',$thread->id) }}">{{ $thread->id }}レス</a>
                        @else
                            <a class="text-center text-sm text-white mb-1 rounded p-1 w-14 block bg-blue-500 hover:bg-blue-700"
                            href="{{ route('user.threads.show',$thread->id) }}">{{ $thread->id }}レス</a>
                        @endif
                        <label class="">{{ $thread->thread_title }}</label>
                    </div>
                    @foreach ( $thread->message as $message )
                        <div class="px-7 py-2.5">
                            <h5 class="my-1">{{ $message->user->name }}：{{ $message->created_at }}</h5>
                            <p>{{ $message->body }}</p>
                        </div>
                    @endforeach
                </div>
            @endforeach
            <div class="max-w-3xl mx-auto">
                <p>{{ $threads->links() }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
