@extends('layouts.app')

@section('title', 'Edit Request')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Request</h1>

<form action="{{ route('requests.update', $requestItem->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-bold">Name</label>
        <input type="text" name="name" value="{{ $requestItem->name }}" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label class="block font-bold">Born On</label>
        <input type="date" name="born_on" value="{{ $requestItem->born_on }}" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label class="block font-bold">Street</label>
        <input type="text" name="street" value="{{ $requestItem->street }}" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label class="block font-bold">Document Purpose</label>
        <textarea name="document_purpose" class="w-full border p-2 rounded" required>{{ $requestItem->document_purpose }}</textarea>
    </div>

    <div>
        <label class="block font-bold">Document Type</label>
        <select name="document_type" class="w-full border p-2 rounded" required>
            @foreach (['Brgy Clearance', 'Indigency', 'Residency', 'Brgy Certificate', 'Oath Undertaking'] as $type)
            <option value="{{ $type }}" {{ $requestItem->document_type == $type ? 'selected' : '' }}>{{ $type }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-bold">Status</label>
        <select name="status" class="w-full border p-2 rounded">
            <option value="pending" {{ $requestItem->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="approved" {{ $requestItem->status == 'approved' ? 'selected' : '' }}>Approved</option>
            <option value="rejected" {{ $requestItem->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
        </select>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection