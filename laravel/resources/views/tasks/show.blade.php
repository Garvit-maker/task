@extends('layouts.app')

@section('content')
<div class="container p-4 max-w-2xl mx-auto">
    @if(session('success'))
        <div class="mb-4 p-2 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 flex justify-between items-start">
        <div>
            <h2 class="text-2xl font-semibold">{{ $task->title }}</h2>
            <div class="text-sm text-gray-600">{{ $task->created_at->format('d M Y, H:i') }}</div>
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('tasks.edit', $task) }}" class="px-3 py-1 bg-indigo-600 text-white rounded">Edit</a>

            <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?');" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="px-3 py-1 bg-red-100 text-red-700 rounded">Delete</button>
            </form>
        </div>
    </div>

    <div class="mb-4">
        <p class="whitespace-pre-wrap text-gray-800">{{ $task->description ?? 'No description' }}</p>
    </div>

    <div>
        <strong>Status:</strong>
        <span class="px-2 py-1 rounded {{ $task->is_completed ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
            {{ $task->is_completed ? 'Completed' : 'Pending' }}
        </span>
    </div>

    <a href="{{ route('tasks.index') }}" class="inline-block mt-4 text-blue-600">← Back to list</a>
</div>
@endsection

