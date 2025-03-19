@extends('layouts.app-users')

@section('title', 'Submit Request')

@section('content')
<div class="container max-w-6xl mx-auto px-4">
    <h1 class="text-3xl md:text-4xl font-bold text-center mb-6">Submit a Request</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Document Selection -->
        <div class="bg-white shadow-md p-6 rounded-lg">
            <h2 class="text-lg font-bold mb-4 text-center">Select Document</h2>
            <div class="flex flex-col gap-3">
                <button type="button" class="doc-btn w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition" data-value="Brgy Clearance">
                    Brgy Clearance
                </button>
                <button type="button" class="doc-btn w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition" data-value="Indigency">
                    Indigency
                </button>
                <button type="button" class="doc-btn w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition" data-value="Residency">
                    Residency
                </button>
                <button type="button" class="doc-btn w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition" data-value="Brgy Certificate">
                    Brgy Certificate
                </button>
                <button type="button" class="doc-btn w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition" data-value="Oath Undertaking">
                    Oath Undertaking
                </button>
            </div>
        </div>

        <!-- Request Form -->
        <div class="md:col-span-2 bg-white shadow-md p-6 rounded-lg">
            <h2 class="text-lg font-bold mb-4 text-center">Request Form</h2>
            <form action="{{ route('requests.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold">Name</label>
                        <input type="text" name="name" class="w-full border p-2 rounded" required>
                    </div>
                    <div>
                        <label class="block font-bold">Born On</label>
                        <input type="date" name="born_on" class="w-full border p-2 rounded" required>
                    </div>
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
                    <label class="block font-bold">Selected Document Type</label>
                    <input type="text" id="document_type" name="document_type" class="w-full border p-2 rounded bg-gray-200" readonly required>
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">
                    Submit Request
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.doc-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.getElementById('document_type').value = this.getAttribute('data-value');
            document.querySelectorAll('.doc-btn').forEach(btn => btn.classList.remove('bg-blue-700'));
            this.classList.add('bg-blue-700');
        });
    });
</script>
@endsection