
<x-guest-layout>
    <style>
        .hero-area {
            position: relative;
            background-image: url('{{ asset('adminassets/img/admin.webp') }}'); /* استبدل بمسار الصورة الخاص بك */
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
            background-color: rgba(0, 0, 0, 0.5); /* طبقة شفافة */
        }

        .hero-area .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }

        .hero-area .content h1 {
            font-size: 36px;
            font-weight: bold;
        }

        .hero-area .content p {
            font-size: 20px;
            font-weight: 300;
        }

        .register-form {
            background-color: rgba(255, 255, 255, 0.9); /* جعل الخلفية أكثر وضوحًا */
            padding: 2rem;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .register-form h4 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .main-button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .main-button:hover {
            background-color: #45a049;
        }

        .forgot-password {
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .text-sm {
            font-size: 14px;
        }

        .text-gray-600 {
            color: #4b5563;
        }

        .text-gray-900 {
            color: #1f2937;
        }

        .text-primary-button {
            color: #ffffff;
        }
    </style>

    <div class="hero-area">
        <div class="overlay"></div>
        <div class="content">
            <h1>Employee Leave Management System</h1>
            <p>Register to manage your leave requests</p>
        </div>
    </div>

    <div class="container">
        <div class="register-form">
            <h4>Register</h4>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="input" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="input" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="input" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- User Type -->
                <div>
                    <x-input-label for="type" :value="__('User Type')" />
                    <select id="type" name="type" class="input" required>
                        <option value="employee">{{ __('Employee') }}</option>
                        <option value="admin">{{ __('Admin') }}</option>
                    </select>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered? Log in') }}
                    </a>

                    <x-primary-button class="main-button">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
