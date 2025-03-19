<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Management System</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100">
    <aside class="fixed top-0 left-0 h-screen w-[220px] bg-blue-600 text-white shadow-lg flex flex-col items-center py-5 z-50">
        <img class="w-[150px] h-auto mb-6" src="{{ URL('images/logo.png') }}" alt="logo">
        <nav class="flex flex-col w-full text-left space-y-2 px-4">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700 text-white' : '' }}">Dashboard</a>
            <a href="{{ route('admin.residents') }}" class="sidebar-link {{ request()->routeIs('admin.residents') ? 'bg-blue-700 text-white' : '' }}">Residents</a>
            <a href="{{ route('admin.documents') }}" class="sidebar-link {{ request()->routeIs('admin.documents') ? 'bg-blue-700 text-white' : '' }}">Document Requests</a>
            <a href="{{ route('admin.daily_transactions') }}" class="sidebar-link {{ request()->routeIs('admin.daily_transactions') ? 'bg-blue-700 text-white' : '' }}">Daily Transactions</a>
        </nav>
    </aside>

    <nav class="fixed top-0 left-[220px] w-[calc(100%-220px)] bg-yellow-400 text-gray-700 h-16 flex items-center shadow-md px-6 z-40">
        <h1 class="text-xl font-semibold">Admin Panel</h1>
        <div class="ml-auto relative flex items-center space-x-6">
            @guest
            @if (Route::has('login'))
            <a class="px-4 py-2 text-blue-600 font-semibold hover:bg-gray-200 rounded" href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif
            @if (Route::has('register'))
            <a class="px-4 py-2 text-green-600 font-semibold hover:bg-gray-200 rounded" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
            @else
            <button class="flex items-center gap-2 px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200 transition relative" id="navbarDropdown">
                {{ Auth::user()->name }}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="absolute right-0 mt-2 w-48 bg-white text-gray-700 shadow-lg rounded-lg hidden" id="dropdownMenu">
                <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-red-100 text-red-600" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
            @endguest
        </div>
    </nav>

    <main class="pl-[220px] mt-16 p-6">
        @yield('content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.getElementById('navbarDropdown');
            const dropdownMenu = document.getElementById('dropdownMenu');

            dropdownButton?.addEventListener('click', function(event) {
                dropdownMenu.classList.toggle('hidden');
                dropdownMenu.style.top = `${dropdownButton.offsetHeight + 5}px`; // Adjust dropdown position
                event.stopPropagation();
            });

            document.addEventListener('click', function(event) {
                if (!dropdownButton?.contains(event.target) && !dropdownMenu?.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>

    <style>
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 15px;
            border-radius: 8px;
            font-weight: 500;
            transition: background 0.3s;
        }

        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        #dropdownMenu {
            top: 100%;
            right: 0;
            position: absolute;
        }
    </style>
</body>

</html>