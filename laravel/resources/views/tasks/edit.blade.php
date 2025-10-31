@extends('layouts.app')

@section('content')
<div class="container p-4 max-w-2xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Edit Task</h2>

    @if($errors->any())
        <div class="mb-4 p-2 bg-red-100 text-red-800 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block mb-1 font-medium">Title</label>
            <input type="text" name="title" value="{{ old('title', $task->title) }}" required class="w-full border p-2 rounded" />
        </div>

        <div class="mb-3">
            <label class="block mb-1 font-medium">Description</label>
            <textarea name="description" rows="6" class="w-full border p-2 rounded">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_completed" value="1" class="mr-2" {{ old('is_completed', $task->is_completed) ? 'checked' : '' }}>
                Mark as Completed
            </label>
        </div>

        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
            <a href="{{ route('tasks.show', $task) }}" class="text-gray-700">Cancel</a>
        </div>
    </form>
</div>
@endsection
