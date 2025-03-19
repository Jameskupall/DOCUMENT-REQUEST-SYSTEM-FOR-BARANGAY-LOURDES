@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold mb-5 text-center">Edit Resident</h1>

    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <form action="{{ route('admin.residents.update', $resident->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" value="{{ $resident->name }}" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" value="{{ $resident->email }}" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" required>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('admin.residents') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection