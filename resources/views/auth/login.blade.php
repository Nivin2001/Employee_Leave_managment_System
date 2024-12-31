<x-guest-layout>
    <style>
        .hero-area {
            position: relative;
            background-image: url('{{asset('adminassets/img/admin.webp')}}'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .hero-area .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent overlay */
        }
        .hero-area .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }
        .login-form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }
        .login-form h4 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .main-button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .main-button:hover {
            background-color: #45a049;
        }
        .forgot-password {
            text-decoration: none;
            color: #007bff;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
    </style>

    <div class="hero-area">
        <div class="overlay"></div>
        <div class="content">
            <h1>Employee Leave Management System</h1>
            <p>Sign in to manage your leave requests</p>
        </div>
    </div>

    <div class="container">
        <div class="login-form">
            <h4>Sign In</h4>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="input" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="main-button">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
