@extends('layouts.app')

@section('content')
<div class="container mx-20">
    <h1 class="text-4xl bold text-center mb-5">Request Document</h1>
        <div class="flex gap-5">
            <!-- Buttons Section -->
            <div class="w-1/3 bg-white shadow-md p-5 rounded-lg flex flex-col gap-7 ">
                <h2 class="text-lg font-bold mb-4">Select Document</h2>
                <button class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded mb-3 hover:bg-blue-600">
                    Brgy Clearance
                </button>
                <button class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded mb-3 hover:bg-blue-600">
                    Indigency
                </button>
                <button class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded mb-3 hover:bg-blue-600">
                    Residency
                </button>
                <button class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded mb-3 hover:bg-blue-600">
                    Brgy Certificate
                </button>
                <button class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded mb-3 hover:bg-blue-600">
                    Oath Undertaking
                </button>
            </div>

            <!-- Form Section -->
            <div class="w-2/3 bg-white shadow-md p-5 rounded-lg">
                <h2 class="text-lg font-bold mb-4">Request Form</h2>
                <form action="#" method="POST" class="space-y-4">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-gray-700 font-medium">Name</label>
                        <input type="text" id="name" name="name" 
                               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500" 
                               placeholder="Enter full name" required>
                    </div>
                    <!-- Born On -->
                    <div>
                        <label for="born_on" class="block text-gray-700 font-medium">Born On</label>
                        <input type="date" id="born_on" name="born_on" 
                               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500" 
                               required>
                    </div>
                    <!-- Street -->
                    <div>
                        <label for="street" class="block text-gray-700 font-medium">Street</label>
                        <input type="text" id="street" name="street" 
                               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500" 
                               placeholder="Enter street address" required>
                    </div>
                    <!-- Document Purpose -->
                    <div>
                        <label for="purpose" class="block text-gray-700 font-medium">Document Purpose</label>
                        <textarea id="purpose" name="purpose" 
                                  class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500" 
                                  rows="3" placeholder="Enter purpose for the document" required></textarea>
                    </div>
                    <!-- Submit Button -->
                    <div>
                        <button type="submit" 
                                class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-green-600">
                            Request Document
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection