@extends('layouts.app-users')

@section('content')
<div class="container max-w-6xl mx-auto px-4">
    <h1 class="text-3xl md:text-4xl font-bold text-center mb-6">Request Document</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white shadow-md p-6 rounded-lg">
            <h2 class="text-lg font-bold mb-4 text-center">Select Document</h2>
            <div class="flex flex-col gap-10">
                <button class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">
                    Brgy Clearance
                </button>
                <button class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">
                    Indigency
                </button>
                <button class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">
                    Residency
                </button>
                <button class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">
                    Brgy Certificate
                </button>
                <button class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">
                    Oath Undertaking
                </button>
            </div>
        </div>

        <div class="md:col-span-2 bg-white shadow-md p-6 rounded-lg">
            <h2 class="text-lg font-bold mb-4 text-center">Request Form</h2>
            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-gray-700 font-medium">Name</label>
                        <input type="text" id="name" name="name"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter full name" required>
                    </div>
                    <div>
                        <label for="born_on" class="block text-gray-700 font-medium">Born On</label>
                        <input type="date" id="born_on" name="born_on"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                </div>

                <div>
                    <label for="street" class="block text-gray-700 font-medium">Street</label>
                    <input type="text" id="street" name="street"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter street address" required>
                </div>

                <div>
                    <label for="purpose" class="block text-gray-700 font-medium">Document Purpose</label>
                    <textarea id="purpose" name="purpose"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        rows="3" placeholder="Enter purpose for the document" required></textarea>
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">
                        Request Document
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection