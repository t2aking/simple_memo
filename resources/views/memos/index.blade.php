<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Memos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('memos.create') }}" class="text-blue-500">{{ __('Create New Memo') }}</a>
                    <ul class="mt-4">
                        @foreach ($memos as $memo)
                            <li class="mb-4">
                                <h3 class="text-lg font-semibold">{{ $memo->title }}</h3>
                                <p>{{ $memo->content }}</p>
                                <a href="{{ route('memos.edit', $memo->id) }}" class="text-blue-500">{{ __('Edit') }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
