
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>
    .lg{
        width: 100px;
        height: 100px;
        border-radius: 100%;
    }
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark px-5">
    <div class="container-fluid">
        <a class="navbar-brand text-primary" href="/">Social Network</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div>
            <a href="/login" class="text-Primary">Sign  in</a>
        </div>
    </div>
</nav>
<x-guest-layout >
    <x-authentication-card class="py-4">
        <x-slot name="logo" >
            
            <img class="lg" src="{{asset('images/img.jpg')}}" alt="" srcset="">
        </x-slot>

        <x-validation-errors  />

        <form method="POST" action="{{ route('register') }} " >
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end ">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
<footer class="bg-dark text-white p-3">
    <div class="container d-flex justify-content-between items-center">
        <div>
            <h3 class="text-primary ">Contact US</h3>
            <a href="" class="d-block text-white ">Home</a>
            <a class="d-block text-white ">Contact Us</a>
            <a class="d-block text-white ">Adrress</a>
        </div>
        <div>
            <h3 class="text-primary ">Links</h3>
            <a href="#" class="d-block text-white">Home</a>
            <a href="#" class="d-block text-white">Social Network</a>
            <a href="#" class="d-block text-white">Posts</a>
        </div>
        <div>
            <h3 class="text-primary ">Guides</h3>
            <a href="#" class="d-block text-white">Getting Started</a>
            <a href="#" class="d-block text-white">Tuto</a>
        </div>
        <div>
            <h3 class="text-primary ">Blog</h3>
            <a href="#" class="d-block text-white">Explore</a>
            <a href="#" class="d-block text-white">Categories</a>
           
        </div>
        
    </div>
</footer>
