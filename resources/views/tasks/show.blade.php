@extends('layouts.app')


@section('content')
<div class="p-4 bg-white rounded-lg shadow-lg">
    <h1 class="text-4xl font-semibold mb-6 text-center">{{ $task->title }}</h1>

    <p class="text-lg mb-4">Description: {{ $task->description }}</p>

    @if ($task->long_description)
        <p class="text-lg mb-4 ">Details: {{ $task->long_description }}</p>
    @endif

    <p class="text-lg mb-4 text-slate-500">Created {{ $task->created_at->diffForHumans() }}</p>

    @if ($task->updated_at)
        <p class="text-lg mb-4 text-slate-500">Updated {{ $task->updated_at->diffForHumans() }}</p>
    @endif

    <p class="text-lg mb-4">
        @if ($task->completed == true)
            <span class="text-green-500 font-medium">Task completed</span>
        @else
            <span class="text-red-500 font-medium">Task not completed</span>
        @endif
    </p>

    <div class="flex space-x-4 mt-4">
        <div>
            <form action="{{ route('tasks.index') }}" method="GET">
                @csrf
                <button
                    class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                    type="submit">
                    Home
                </button>
            </form>
        </div>

        <div>
            <form action="{{ route('tasks.edit', ['task' => $task->id]) }}" method="GET">
                @csrf
                <button
                    class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-full font-semibold focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50"
                    type="submit">
                    Edit
                </button>
            </form>
        </div>

        <div>
            <form action="{{ route('tasks.complete', ['task' => $task->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <button
                    class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-full font-semibold focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                    type="submit">
                    {{ $task->completed ? 'Mark as Incompleted' : 'Mark as Completed' }}
                </button>
            </form>
        </div>

        <div>
            <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button
                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-full font-semibold focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50"
                    type="submit">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
