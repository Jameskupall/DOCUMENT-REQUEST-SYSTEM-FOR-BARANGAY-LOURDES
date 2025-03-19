@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-4xl text-center mb-5">Document Request</h1>
    <div class="bg-white shadow-md rounded-lg p-5">
        <h2 class="text-xl font-bold mb-4">Pending Document Requests</h2>

        @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">{{ session('error') }}</div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 text-left">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Purpose</th>
                        <th class="border border-gray-300 px-4 py-2">Document</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $request->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $request->document_purpose }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $request->document_type }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <span class="px-3 py-1 rounded 
                                {{ $request->status == 'pending' ? 'bg-yellow-400 text-white' : '' }}
                                {{ $request->status == 'approved' ? 'bg-green-500 text-white' : '' }}
                                {{ $request->status == 'rejected' ? 'bg-red-500 text-white' : '' }}">
                                {{ ucfirst($request->status) }}
                            </span>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 whitespace-nowrap">
                            @if($request->status == 'pending')
                            <form action="{{ route('admin.requests.updateStatus', ['requestItem' => $request->id, 'status' => 'approved']) }}" method="POST" class="inline">
                                @csrf
                                <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Approve</button>
                            </form>
                            <form action="{{ route('admin.requests.updateStatus', ['requestItem' => $request->id, 'status' => 'rejected']) }}" method="POST" class="inline">
                                @csrf
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Reject</button>
                            </form>
                            @else
                            <span class="text-gray-500">No actions</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection