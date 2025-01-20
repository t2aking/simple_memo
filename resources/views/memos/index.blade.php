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
                    <table class="mt-4 w-full">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Creator</th>
                                <th class="border px-4 py-2">Title</th>
                                <th class="border px-4 py-2">Content</th>
                                <th class="border px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($memos as $memo)
                                <tr>
                                    <td class="border px-4 py-2">{{ $memo->id }}</td>
                                    <td class="border px-4 py-2">{{ $memo->user->name }}</td>
                                    <td class="border px-4 py-2">{{ $memo->title }}</td>
                                    <td class="border px-4 py-2">{{ Str::limit($memo->content, 10, '...') }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('memos.edit', $memo->id) }}" class="text-blue-500">{{ __('Edit') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
