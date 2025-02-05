@extends('layouts.app')

@section('content')
<div class="container mx-20">
    <h1 class="text-4xl text-center mb-5">Document Request</h1>
        <div class="bg-white shadow-md rounded-lg p-5">
            <h2 class="text-xl font-bold mb-4">Pending Document Requests</h2>
            <table class="w-full border-collapse border border-gray-300 text-left">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Purpose</th>
                        <th class="border border-gray-300 px-4 py-2">Document</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">John Doe</td>
                        <td class="border border-gray-300 px-4 py-2">Employment Requirement</td>
                        <td class="border border-gray-300 px-4 py-2">Brgy Clearance</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                Approve
                            </button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Reject
                            </button>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">Jane Smith</td>
                        <td class="border border-gray-300 px-4 py-2">Scholarship Application</td>
                        <td class="border border-gray-300 px-4 py-2">Residency</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                Approve
                            </button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Reject
                            </button>
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">Mark Taylor</td>
                        <td class="border border-gray-300 px-4 py-2">Travel Abroad</td>
                        <td class="border border-gray-300 px-4 py-2">Residency</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                Approve
                            </button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Reject
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection