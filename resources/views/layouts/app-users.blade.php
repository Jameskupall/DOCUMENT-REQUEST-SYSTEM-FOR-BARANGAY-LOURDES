<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Management System</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <aside class="fixed top-0 left-0 h-screen w-[220px] bg-blue-600 text-white shadow-lg flex flex-col items-center py-5 z-50">
        <img class="w-[150px] h-auto mb-6" src="{{ URL('images/logo.png') }}" alt="logo">

        <nav class="flex flex-col w-full text-left space-y-2 px-4">
            <a href="{{ route('home') }}" class="sidebar-link {{ request()->routeIs('home') ? 'bg-blue-700 text-white' : '' }}">
                Home
            </a>
            <a href="{{ route('requests.create') }}" class="sidebar-link {{ request()->routeIs('requests.create') ? 'bg-blue-700 text-white' : '' }}">
                Documents Request
            </a>
            <a href="{{ route('requests.index') }}" class="sidebar-link {{ request()->routeIs('requests.index') ? 'bg-blue-700 text-white' : '' }}">
                Your Requests
            </a>
        </nav>
    </aside>

    <nav class="fixed top-0 left-[220px] w-[calc(100%-220px)] bg-yellow-400 text-gray-700 h-16 flex items-center shadow-md px-6 z-40">

        <div class="ml-auto relative flex items-center space-x-6">

            <div class="relative">
                <img src="{{ URL('images/bell.svg') }}" class="w-8 cursor-pointer" id="notificationButton" alt="Notifications">

                @if(auth()->user()->unreadNotifications->count() > 0)
                <span id="notificationBadge" class="absolute top-0 right-0 bg-red-500 text-white text-xs px-1.5 py-0.5 rounded-full">
                    {{ auth()->user()->unreadNotifications->count() }}
                </span>
                @endif

                <div id="notificationDropdown" class="absolute right-0 mt-2 w-64 bg-white shadow-lg rounded-lg hidden">
                    <ul class="text-gray-700 max-h-60 overflow-auto">
                        @forelse(auth()->user()->unreadNotifications as $notification)
                        <li class="px-4 py-2 border-b cursor-pointer notification-item" data-id="{{ $notification->id }}">
                            {{ $notification->data['message'] }}
                        </li>
                        @empty
                        <li class="px-4 py-2">No new notifications</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            @guest
            @if (Route::has('login'))
            <a class="px-4 py-2 text-blue-600 font-semibold hover:bg-gray-200 rounded" href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif

            @if (Route::has('register'))
            <a class="px-4 py-2 text-green-600 font-semibold hover:bg-gray-200 rounded" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
            @else

            <div class="relative">
                <button class="flex items-center gap-2 px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200 transition" id="navbarDropdown">
                    {{ Auth::user()->name }}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div class="absolute right-0 mt-2 w-48 bg-white text-gray-700 shadow-lg rounded-lg hidden" id="dropdownMenu">
                    <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-red-100 text-red-600"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
            @endguest
        </div>
    </nav>


    <main class="pl-[240px] mt-16 p-6">
        @yield('content')
    </main>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.getElementById('navbarDropdown');
            const dropdownMenu = document.getElementById('dropdownMenu');
            const notificationButton = document.getElementById('notificationButton');
            const notificationDropdown = document.getElementById('notificationDropdown');
            const notificationBadge = document.getElementById('notificationBadge');


            dropdownButton?.addEventListener('click', function(event) {
                dropdownMenu.classList.toggle('hidden');
                event.stopPropagation();
            });


            notificationButton?.addEventListener('click', function(event) {
                notificationDropdown.classList.toggle('hidden');


                if (notificationBadge) {
                    notificationBadge.remove();
                }

                event.stopPropagation();
            });


            document.addEventListener('click', function(event) {
                if (!dropdownButton?.contains(event.target) && !dropdownMenu?.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
                if (!notificationButton?.contains(event.target) && !notificationDropdown?.contains(event.target)) {
                    notificationDropdown.classList.add('hidden');
                }
            });


            document.querySelectorAll('.notification-item').forEach(item => {
                item.addEventListener('click', function() {
                    let notificationId = this.dataset.id;
                    fetch(`/notifications/read/${notificationId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                    }).then(() => {
                        this.remove();
                        if (document.querySelectorAll('.notification-item').length === 0) {
                            notificationDropdown.innerHTML = '<li class="px-4 py-2">No new notifications</li>';
                        }
                    });
                });
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
            position: absolute;
            right: 0;
            min-width: 160px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
            z-index: 1000;
            transform: translateY(5px);
        }
    </style>

</body>

</html>