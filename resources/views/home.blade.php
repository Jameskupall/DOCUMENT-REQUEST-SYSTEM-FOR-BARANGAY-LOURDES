@extends('layouts.app')

@section('content')
<div class="text-center p-5">
    <h1 class="text-3xl font-bold">Welcome to Document Base Management System</h1>
    <p class="text-lg text-gray-600">Dashboard</p>
</div>

<div class="w-full flex flex-col items-center gap-10 p-5">

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-8 w-full max-w-5xl">
        <div class="flex flex-col md:flex-row gap-8 w-full">
            <div class="w-full max-w-xs mx-auto rounded-lg overflow-hidden shadow-lg">
                <div class="bg-yellow-500 h-24 flex items-center justify-center">
                    <p class="text-white font-bold text-xl">Brgy Clearance</p>
                </div>
                <div class="bg-blue-500 h-48 flex items-center justify-center gap-20">
                    <img src="{{URL ('images/sun.svg')}}" class="w-20" alt="">
                    <p class="text-white font-bold text-xl">5</p>
                </div>
            </div>

            <div class="w-full max-w-xs mx-auto rounded-lg overflow-hidden shadow-lg">
                <div class="bg-yellow-500 h-24 flex items-center justify-center">
                    <p class="text-white font-bold text-xl">Indigency</p>
                </div>
                <div class="bg-blue-500 h-48 flex items-center justify-center gap-20">
                    <img src="{{URL ('images/sun.svg')}}" class="w-20" alt="">
                    <p class="text-white font-bold text-xl">3</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-8 w-full">
            <div class="w-full max-w-xs mx-auto rounded-lg overflow-hidden shadow-lg">
                <div class="bg-yellow-500 h-24 flex items-center justify-center">
                    <p class="text-white font-bold text-xl">Residency</p>
                </div>
                <div class="bg-blue-500 h-48 flex items-center justify-center gap-20">
                    <img src="{{URL ('images/sun.svg')}}" class="w-20" alt="">
                    <p class="text-white font-bold text-xl">1</p>
                </div>
            </div>

            <div class="w-full max-w-xs mx-auto rounded-lg overflow-hidden shadow-lg">
                <div class="bg-yellow-500 h-24 flex items-center justify-center">
                    <p class="text-white font-bold text-xl">Brgy Certificate</p>
                </div>
                <div class="bg-blue-500 h-48 flex items-center justify-center gap-20">
                    <img src="{{URL ('images/sun.svg')}}" class="w-20" alt="">
                    <p class="text-white font-bold text-xl">2</p>
                </div>
            </div>
        </div>

        <div class="w-full max-w-xs mx-auto rounded-lg overflow-hidden shadow-lg md:col-span-2">
            <div class="bg-yellow-500 h-24 flex items-center justify-center">
                <p class="text-white font-bold text-xl">Oath Understanding</p>
            </div>
            <div class="bg-blue-500 h-48 flex items-center justify-center gap-20">
                <img src="{{URL ('images/sun.svg')}}" class="w-20" alt="">
                <p class="text-white font-bold text-xl">2</p>
            </div>
        </div>
    </div>
</div>

@endsection