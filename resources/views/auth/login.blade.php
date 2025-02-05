<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>

<div class="border-8 flex items-center h-[500px] w-4/5 mx-auto rounded-2xl mt-40">
    <div class="w-1/2">
        <div class="">
            <div class="flex flex-col gap-5 items-center">
                <h1 class="text-4xl textce">DOCUMENT BASED MANAGEMENT SYSTEM</h1>
                <div class="text-2xl">LOGIN</div>

                <div class="">
                    <form method="POST" action="{{ route('login') }}" class="">
                        @csrf

                        <div class="w-full">
                            <label for="email" class="">{{ __('Email Address') }}</label>

                            <div class="w-full">
                                <input id="email" type="email" class="input-form w-full" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="w-full">
                                <input id="password" type="password" class="input-form w-full" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-5 w-full">
                            <div class="">
                                <div class="">
                                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col items-center w-full justify-center">
                            <div class="w-full">
                                <button type="submit" class="bg-blue-600 text-white rounded mb-2 p-1 px-6 w-full">
                                    SIGN IN
                                </button>
                                <br>
                                @if (Route::has('password.request'))
                                    <a class="text-blue-300" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-blue-600 w-1/2 h-full rounded flex items-center justify-center flex-col">
        <div class="h-20 w-20 mb-3">
            <img src="{{URL ('images/logo.png')}}" alt="logo">
        </div>
        <p class="text-2xl text-center text-white">To start your Journey with us, please Sign Up</p>
        <a class="p-2 rounded-2xl mt-5 w-20 text-center border-2 text-white" href="{{ route('register') }}">Sign Up</a>
    </div>
</div>


</body>
</html>
