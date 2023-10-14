@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <div class="text-lg mb-4">
            <p><strong>Name:</strong> {{ $user->name }}</p>
        </div>

        <div class="text-lg mb-4">
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>

        <div class="text-lg mb-4 text-gray-600">
            <p><strong>Created:</strong> {{ $user->created_at->diffForHumans() }}</p>
        </div>

        <div class="text-lg mb-4 text-gray-600">
            <p><strong>Updated:</strong> {{ $user->updated_at->diffForHumans() }}</p>
        </div>

        <div class="flex space-x-2 items-center mt-4"> <!-- Alterado de space-x-4 para space-x-2 -->
            <div>
                <a class="px-4 py-2 bg-blue-500 hover-bg-blue-600 text-white rounded-full font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                   href="{{ route('user.edit', ['user' => $user->id]) }}">Edit Profile</a>
            </div>

            <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('DELETE') <!-- Use o método DELETE para excluir o usuário -->
                <button type="submit" class="px-4 py-2 bg-red-500 hover-bg-red-600 text-white rounded-full font-semibold focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50"
                        onclick="return confirm('Tem certeza de que deseja excluir este usuário?')">Delete User</button>
            </form>
        </div>
    </div>
@endsection
