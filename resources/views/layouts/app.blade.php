<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar and Navbar</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <nav class="bg-yellow-500 text-white h-24 flex items-center shadow-lg px-4 w-full">
        <div class="flex-grow"></div>



        <div class="relative flex">
            @guest
            @if (Route::has('login'))
            <a class="px-4 py-2 hover:bg-blue-600 rounded" href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif

            @if (Route::has('register'))
            <a class="px-4 py-2 hover:bg-blue-600 rounded" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
            @else
            <img src="{{URL ('images/bell.svg')}}" class="w-9" alt="">
            <button class="flex items-center gap-2 px-4 py-2 hover:bg-green-600 rounded" id="navbarDropdown">
                {{ Auth::user()->name }}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="absolute right-0 mt-2 w-48 bg-white text-black shadow-lg rounded hidden" id="dropdownMenu">
                <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-100"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
            @endguest
        </div>
    </nav>

    <div class="">

        <div class="fixed top-0 left-0 h-full w-[200px] bg-blue-500 text-white shadow-lg flex flex-col  items-center">
        <img class="w-[150px] h-auto" src="{{URL ('images/logo.png')}}" alt="logo">
            <div class="">
                <a href="/home" class="link mt-24">Dashboard</a>
                <a href="/residents" class="link">Residents</a>
                <a href="/documents" class="link">Documents</a>
                <a href="/daily_transactions" class="link">Daily Transactions</a>
            </div>
        <div class="mt-auto">
        <a href="{{ route('logout') }}" class="link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
        </div>
        </div>


        <div class="ml-[200px] p-4 w-full">
            @yield('content')
            
        </div>


    </div>


    <script>
        const dropdownToggle = document.getElementById('navbarDropdown');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownToggle?.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    </script>

</body>

</html>