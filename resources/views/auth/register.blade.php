<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">



    <div class="shadow-2xl flex items-center h-[500px] w-4/5 mx-auto rounded-2xl mt-40 ">
        <div class="bg-blue-600 w-1/2 h-full rounded-2xl flex items-center justify-center flex-col">
            <div class="h-20 w-20 mb-3">
                <img src="{{URL ('images/logo.png')}}" alt="logo">
            </div>
            <p class="text-2xl text-white text-center">To keep connected with us, please log in</p>
            <a class="p-2 rounded-2xl border-2 text-white mt-5 w-20 text-center" href="{{ route('login') }}">Sign Up</a>
            <button></button>
        </div>
        <div class="w-1/2 rounded-2xl bg-white h-full">
            <div class="flex flex-col gap-5 items-center justify-center mt-12">
                <div class="text-4xl">{{ __('Register') }}</div>

                <div>
                    <form method="POST" action="{{ route('register') }}" class="flex flex-col items-center">
                        @csrf

                        <div>
                            <label for="name">{{ __('Name') }}</label>

                            <div>
                                <input id="name" type="text" name="name" class="border-2 border-black rounded mb-5" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email">{{ __('Email Address') }}</label>

                            <div>
                                <input id="email" type="email" class="border-2 border-black rounded mb-5" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password" class="border-2 border-black rounded mb-5" name="password" required autocomplete="new-password">

                                @error('password')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            <div>
                                <input id="password-confirm" type="password" class="border-2 border-black rounded mb-5" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div>
                            <div>
                                <button type="submit" class="w-40 bg-blue-600 p-1 rounded mb-2">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


</body>

</html>