@extends('layouts.app')

@section('content')
<div class="container p-4 max-w-2xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Create Task</h2>

    @if($errors->any())
        <div class="mb-4 p-2 bg-red-100 text-red-800 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="block mb-1 font-medium">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required class="w-full border p-2 rounded" />
        </div>

        <div class="mb-3">
            <label class="block mb-1 font-medium">Description</label>
            <textarea name="description" rows="6" class="w-full border p-2 rounded">{{ old('description') }}</textarea>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Create</button>
            <a href="{{ route('tasks.index') }}" class="text-gray-700">Cancel</a>
        </div>
    </form>
</div>
@endsection
