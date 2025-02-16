@extends('layouts.app')

@section('title', 'Submit Request')

@section('content')
<h1 class="text-2xl font-bold mb-4">Submit a Request</h1>

<form action="{{ route('requests.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="block font-bold">Name</label>
        <input type="text" name="name" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label class="block font-bold">Born On</label>
        <input type="date" name="born_on" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label class="block font-bold">Street</label>
        <input type="text" name="street" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label class="block font-bold">Document Purpose</label>
        <textarea name="document_purpose" class="w-full border p-2 rounded" required></textarea>
    </div>

    <div>
        <label class="block font-bold">Document Type</label>
        <select name="document_type" class="w-full border p-2 rounded" required>
            <option value="Brgy Clearance">Brgy Clearance</option>
            <option value="Indigency">Indigency</option>
            <option value="Residency">Residency</option>
            <option value="Brgy Certificate">Brgy Certificate</option>
            <option value="Oath Undertaking">Oath Undertaking</option>
        </select>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
</form>
@endsection