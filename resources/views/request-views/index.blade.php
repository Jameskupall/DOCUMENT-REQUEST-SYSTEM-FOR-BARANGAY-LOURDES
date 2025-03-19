@extends('layouts.app-users')


@section('title', 'All Requests')

@section('content')
<h1 class="text-2xl font-bold mb-4">All Requests</h1>

@if (session('success'))
<p class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</p>
@endif

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-blue-500 text-white">
        <tr>
            <th class="border p-2">Name</th>
            <th class="border p-2">Born On</th>
            <th class="border p-2">Street</th>
            <th class="border p-2">Document Type</th>
            <th class="border p-2">Status</th>
            <th class="border p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($requests as $request)
        <tr class="border">
            <td class="p-2">{{ $request->name }}</td>
            <td class="p-2">{{ $request->born_on }}</td>
            <td class="p-2">{{ $request->street }}</td>
            <td class="p-2">{{ $request->document_type }}</td>
            <td class="p-2 text-{{ $request->status == 'approved' ? 'green' : ($request->status == 'rejected' ? 'red' : 'gray') }}-600">
                {{ ucfirst($request->status) }}
            </td>
            <td class="p-2">
                <a href="{{ route('requests.edit', $request->id) }}" class="text-blue-500">Edit</a>
                <form action="{{ route('requests.destroy', $request->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 ml-2">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection