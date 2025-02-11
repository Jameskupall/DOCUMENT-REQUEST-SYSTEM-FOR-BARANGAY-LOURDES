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
                        <th class="border border-gray-300 px-4 py-2 text-center">Street</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Needs</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Age</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">DOB</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Where to Use</th>
                    </tr>
                </thead>
                <tbody class="text-sm sm:text-base">
                    <tr class="even:bg-gray-100 text-center">
                        <td class="border border-gray-300 px-4 py-2">John Doe</td>
                        <td class="border border-gray-300 px-4 py-2">123 Elm Street</td>
                        <td class="border border-gray-300 px-4 py-2">Brgy Clearance</td>
                        <td class="border border-gray-300 px-4 py-2">35</td>
                        <td class="border border-gray-300 px-4 py-2">1988-03-15</td>
                        <td class="border border-gray-300 px-4 py-2">School Registration</td>
                    </tr>
                    <tr class="even:bg-gray-100 text-center">
                        <td class="border border-gray-300 px-4 py-2">Jane Smith</td>
                        <td class="border border-gray-300 px-4 py-2">456 Oak Lane</td>
                        <td class="border border-gray-300 px-4 py-2">Brgy Clearance</td>
                        <td class="border border-gray-300 px-4 py-2">29</td>
                        <td class="border border-gray-300 px-4 py-2">1994-06-22</td>
                        <td class="border border-gray-300 px-4 py-2">Employment Verification</td>
                    </tr>
                    <tr class="even:bg-gray-100 text-center">
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
</div>

@endsection