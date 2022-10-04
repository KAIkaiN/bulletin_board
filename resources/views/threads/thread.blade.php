<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('新規スレッド作成画面') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-xl mx-auto bg-white overflow-hidden rounded-xl border border-slate-300">
                <h5 class="card-header bg-gray-300 py-4 px-10 text-left text-lg font-bold text-gray-50">新規スレッド作成</h5>
                <form method="post" action="{{ route('user.threads.store') }}" class="grid grid-cols-1 gap-6 m-10">
                    @csrf
                    <label class="block">
                      <span class="text-gray-700">スレッドタイトル</span>
                      <input name="name" type="text"
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
        </div>
    </div>
</x-app-layout>
