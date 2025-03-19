@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold mb-5 text-center">Residents</h1>

    <!-- Responsive Table Wrapper -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-max border-collapse border border-gray-300">
                <thead class="bg-blue-400 text-white">
                    <tr class="text-sm sm:text-base">
                        <th class="border border-gray-300 px-4 py-2 text-center">Name</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Email</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm sm:text-base">
                    @foreach($residents as $resident)
                    <tr class="even:bg-gray-100 text-center">
                        <td class="border border-gray-300 px-4 py-2">{{ $resident->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $resident->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('admin.residents.edit', $resident->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                            <form action="{{ route('admin.residents.destroy', $resident->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this resident?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection