@extends('layouts.app')

@section('content')

<div class="container mx-20">
        <h1 class="text-2xl font-bold mb-5 text-center">Residents</h1>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full border-collapse border border-gray-300">
                <thead class="bg-blue-400 text-white">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Street</th>
                        <th class="border border-gray-300 px-4 py-2">Needs</th>
                        <th class="border border-gray-300 px-4 py-2">Age</th>
                        <th class="border border-gray-300 px-4 py-2">DOB</th>
                        <th class="border border-gray-300 px-4 py-2">Where to Use</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="even:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">John Doe</td>
                        <td class="border border-gray-300 px-4 py-2">123 Elm Street</td>
                        <td class="border border-gray-300 px-4 py-2">Brgy Clearance</td>
                        <td class="border border-gray-300 px-4 py-2">35</td>
                        <td class="border border-gray-300 px-4 py-2">1988-03-15</td>
                        <td class="border border-gray-300 px-4 py-2">School Registration</td>
                    </tr>
                    <tr class="even:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">Jane Smith</td>
                        <td class="border border-gray-300 px-4 py-2">456 Oak Lane</td>
                        <td class="border border-gray-300 px-4 py-2">Brgy Clearance</td>
                        <td class="border border-gray-300 px-4 py-2">29</td>
                        <td class="border border-gray-300 px-4 py-2">1994-06-22</td>
                        <td class="border border-gray-300 px-4 py-2">Employment Verification</td>
                    </tr>
                    <tr class="even:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">Alice Brown</td>
                        <td class="border border-gray-300 px-4 py-2">789 Pine Drive</td>
                        <td class="border border-gray-300 px-4 py-2">Brgy Clearance</td>
                        <td class="border border-gray-300 px-4 py-2">41</td>
                        <td class="border border-gray-300 px-4 py-2">1982-10-10</td>
                        <td class="border border-gray-300 px-4 py-2">Hospital Admission</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
        
@endsection