@extends('layouts.app')

@section('title', 'Task List')

@section('content')
<div class="max-w-lg mx-auto">
    @forelse ($tasks as $task)
        @if ($user->id == $task->user_id)
            <div class="p-4 mb-4 bg-white rounded-lg shadow-lg">
                <p class="mb-2">
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                        class="text-lg font-semibold {{ $task->completed ? 'line-through text-gray-500' : 'text-blue-500 hover:text-blue-600' }}">
                        {{ $task->title }}
                    </a>
                </p>
                <p class="text-slate-500">Created {{ $task->created_at->diffForHumans() }}</p>
                @if ($task->updated_at)
                    <p class="text-slate-500">Updated {{ $task->updated_at->diffForHumans() }}</p>
                @endif
                <p class="text-lg">
                    @if ($task->completed)
                        <span class="text-green-500 font-medium">Task completed</span>
                    @else
                        <span class="text-red-500 font-medium">Task not completed</span>
                    @endif
                </p>
            </div>
        @endif
    @empty
        <div class="text-lg font-semibold text-gray-500">No tasks</div>
    @endforelse

    <form action="{{ route('tasks.create') }}" method="GET">
        @csrf
        <button
            class="mt-5 px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-full font-semibold focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
            type="submit">Create Task</button>
    </form>

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
</div>
@endsection
