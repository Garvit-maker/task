@extends('layouts.app')

@section('content')
<div class="container p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">My Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded">Create Task</a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-2 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($tasks->count())
        <ul>
            @foreach($tasks as $task)
                <li class="border p-3 mb-3 rounded flex justify-between items-start">
                    <div class="pr-4">
                        <a href="{{ route('tasks.show', $task) }}" class="text-lg font-medium text-gray-800 hover:underline">
                            {{ $task->title }}
                        </a>
                        <div class="text-sm text-gray-500">{{ $task->created_at->diffForHumans() }}</div>
                        @if($task->description)
                            <div class="mt-2 text-sm text-gray-700">
                                {{ Str::limit($task->description, 200) }}
                            </div>
                        @endif
                    </div>

                    <div class="text-right flex flex-col items-end gap-3">
                        <div>
                            <span class="px-2 py-1 rounded text-sm {{ $task->is_completed ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $task->is_completed ? 'Completed' : 'Pending' }}
                            </span>
                        </div>

                        <div class="flex items-center gap-2">
                            <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600 hover:underline">Edit</a>

                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Delete</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    @else
        <p>No tasks yet. <a href="{{ route('tasks.create') }}" class="text-blue-600">Create one</a>.</p>
    @endif
</div>
@endsection
