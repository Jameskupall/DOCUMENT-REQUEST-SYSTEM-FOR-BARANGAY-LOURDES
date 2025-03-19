@extends('layouts.app-users')


@section('content')
<div class="bg-gray-100 flex items-center justify-center min-h-screen py-10 px-4">
    <div class="w-full max-w-4xl p-10 bg-white shadow-lg rounded-lg">
        <h1 class="text-4xl font-bold text-gray-900 text-center">DOCUMENT REQUEST SYSTEM</h1>
        <h2 class="text-2xl text-gray-700 mt-2 text-center">For Barangay Lourdes</h2>
        <p class="mt-4 text-gray-600 text-center">Easily request documents like Barangay Clearance, Cedula, and more.</p>

        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
            <a href="#" class="px-6 py-4 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">Request a Document</a>
            <a href="#" class="px-6 py-4 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">Check Request Status</a>
            <a href="#" class="px-6 py-4 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700">Contact Support</a>
        </div>

        <div class="mt-10 text-gray-700 text-lg">
            <h3 class="text-xl font-semibold">How It Works</h3>
            <ul class="mt-2 space-y-2 list-disc list-inside">
                <li>Submit your request for the required document online.</li>
                <li>Our team will process your request within the stated timeframe.</li>
                <li>Receive a notification when your document is ready for pickup.</li>
            </ul>
        </div>

        <div class="mt-10 bg-gray-50 p-6 rounded-lg">
            <h3 class="text-lg font-semibold text-gray-800">Operating Hours</h3>
            <p class="text-gray-600">Monday - Friday, 8:00 AM - 5:00 PM</p>
            <p class="text-gray-600">Email: support@barangaylourdes.ph | Contact: (123) 456-7890</p>
        </div>
    </div>
</div>
@endsection