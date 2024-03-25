<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/primeicons/5.0.0/primeicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%
            overflow: hidden;
            font-family: 'Noto Kufi Arabic', serif;
            display: flex;
        }
        h1,h4,.text-gray-700,.ease-in-out{
            font-family: 'Noto Kufi Arabic', serif;
        }
        .left {
            flex: 1;
        }
        .left img {
            width: 100%;
            height: 100%;
            display: block;
            margin: auto;
        }
        .right {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin: auto;
            text-align: center; /* Center the contents */
        }
        .login-form {
            padding: 20px;
            border-radius: 8px;
            background: #fff;
        }
        h1{
            font-weight: bold !important;
        }
        .mt-4, .my-4{
            margin-top: 1rem !important;
        }

        
        @media (max-width: 768px) {
            .left img {
                display: none; /* Hide the image on screens narrower than 768px */
            }
            .right {
                justify-content: center;
                width: 100%; /* Full width for the form on smaller screens */
            }
        }
    </style>
</head>
<body>
    <div class="left">
        <img src="{{ asset('/images/image.png') }}" alt="Image">
    </div>        
    <div class="right">
        <div class="login-form">
            <x-guest-layout>
                <!-- Session Status -->
                <h4 style="font-size: 1.5rem; font-weight:bold">نظام تسجيل الطلبة</h4>
                <br>
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="name" :value="__('اسم المستخدم')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
        
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('كلمة السر')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="captcha" :value="__('رمز التحقق')" />
                        <x-text-input id="captcha" class="block mt-1 w-full" type="text" name="captcha" required autocomplete="off" />
                        <x-input-error :messages="$errors->get('captcha')" class="mt-2" />
                    </div>
                    

                <div class="mt-4">
                    <img id="captchaImage" src="{{ captcha_src('flat') }}" alt="Captcha">
                </div>
                
                
                    <!-- Remember Me -->
                  <!--  <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>-->

                    <div class=" items-center center mt-4">
                <!--        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif-->

                        <x-primary-button class="ms-3">
                            {{ __('دخول') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-guest-layout>
        </div>
    </div>
</body>
</html>
