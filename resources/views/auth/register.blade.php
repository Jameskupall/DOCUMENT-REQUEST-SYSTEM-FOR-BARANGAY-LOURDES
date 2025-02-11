<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="shadow-2xl flex flex-col md:flex-row items-center h-auto md:h-[500px] w-11/12 md:w-4/5 mx-auto rounded-2xl overflow-hidden">

        <div class="bg-blue-600 w-full md:w-1/2 h-72 md:h-full flex items-center justify-center flex-col p-6">
            <div class="h-20 w-20 mb-3">
                <img src="{{ URL('images/logo.png') }}" alt="logo">
            </div>
            <p class="text-xl md:text-2xl text-white text-center">To keep connected with us, please log in</p>
            <a class="p-2 rounded-2xl border-2 text-white mt-5 w-24 text-center hover:bg-white hover:text-blue-600 transition"
                href="{{ route('login') }}">
                Sign Up
            </a>
        </div>

        <div class="w-full md:w-1/2 bg-white h-full flex flex-col items-center justify-center p-6 md:p-10">
            <h1 class="text-3xl md:text-4xl font-bold mb-6">{{ __('Register') }}</h1>

            <form method="POST" action="{{ route('register') }}" class="w-full max-w-sm">
                @csrf

                <div>
                    <label for="name" class="block font-medium text-gray-700">Name</label>
                    <input id="name" type="text" name="name"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="email" class="block font-medium text-gray-700">Email Address</label>
                    <input id="email" type="email" name="email"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="password" class="block font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required autocomplete="new-password">
                    @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="password-confirm" class="block font-medium text-gray-700">Confirm Password</label>
                    <input id="password-confirm" type="password" name="password_confirmation"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required autocomplete="new-password">
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>

    </div>
</body>

</html>