@extends('layouts.app')

@section('content')
<div class="text-2xl">
    <h1>Welcome to Document Base Management System</h1>
    <p>Dashboard</p>
</div>
<div class="w-full flex flex-col items-center gap-10 shadow-lg p-5">

    <div class="flex w-[50%] h-auto">
        <div class="w-96 mx-auto rounded-lg overflow-hidden shadow-lg">
            <div class="bg-yellow-500 h-24 flex items-center justify-center">
                <p class="text-white font-bold text-xl">Brgy Clearance</p>
            </div>
            <div class="bg-blue-500 h-48 flex items-center justify-center gap-20">
                <img src="{{URL ('images/sun.svg')}}" class="w-20" alt="">
                <p class="text-white font-bold text-xl">5</p>
            </div>
        </div>

        <div class="w-96 mx-auto rounded-lg overflow-hidden shadow-lg">

            <div class="bg-yellow-500 h-24 flex items-center justify-center ">
                <p class="text-white font-bold text-xl">Indigency</p>
            </div>

            <div class="bg-blue-500 h-48 flex items-center justify-center gap-20">
                <img src="{{URL ('images/sun.svg')}}" class="w-20" alt="">

                <p class="text-white font-bold text-xl">3</p>
            </div>
        </div>

    </div>
    <div class="flex w-[50%] h-auto ">
        <div class="w-96 mx-auto rounded-lg overflow-hidden shadow-lg">

            <div class="bg-yellow-500 h-24 flex items-center justify-center">
                <p class="text-white font-bold text-xl">Residency</p>
            </div>

            <div class="bg-blue-500 h-48 flex items-center justify-center gap-20">
                <img src="{{URL ('images/sun.svg')}}" class="w-20" alt="">

                <p class="text-white font-bold text-xl">1</p>
            </div>
        </div>

        <div class="w-96 mx-auto rounded-lg overflow-hidden shadow-lg">

            <div class="bg-yellow-500 h-24 flex items-center justify-center">
                <p class="text-white font-bold text-xl">Brgy Certificate</p>
            </div>

            <div class="bg-blue-500 h-48 flex items-center justify-center gap-20">
                <img src="{{URL ('images/sun.svg')}}" class="w-20" alt="">

                <p class="text-white font-bold text-xl">2</p>
            </div>
        </div>

    </div>
    <div class="w-96 mx-auto rounded-lg overflow-hidden shadow-lg">

        <div class="bg-yellow-500 h-24 flex items-center justify-center">
            <p class="text-white font-bold text-xl">Oath Understanding</p>
        </div>

        <div class="bg-blue-500 h-48 flex items-center justify-center gap-20">
            <img src="{{URL ('images/sun.svg')}}" class="w-20" alt="">

            <p class="text-white font-bold text-xl">2</p>
        </div>
    </div>

</div>
@endsection