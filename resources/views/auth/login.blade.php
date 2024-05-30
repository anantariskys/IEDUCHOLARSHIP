<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div>
        <img src="{{ asset('images/logoWeb.png') }}" alt="Example Image" class="w-2/6 mx-auto aspect-auto">
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

       
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

      
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

       
        <div class="block mt-4">
            <label for="remember_me" class="flex justify-end items-center ">
                
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </label>
        </div>
        
        <div class="flex items-center w-full mt-4">
            
            <button class="text-center w-full bg-[#8ECAE6] rounded-lg text-base py-3 text-neutral-900">
                {{ __('Log in') }}

            </button>
           
        </div>
        <div class="block mt-4">
            <label for="remember_me" class="flex justify-start items-center">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    {{ __('Not Registered Yet?') }}
                </a>
            
            </label>
        </div>
    </form>
</x-guest-layout>
