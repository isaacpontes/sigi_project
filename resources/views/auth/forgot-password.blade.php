<x-guest-layout>
    <x-slot name="navlinks">
        <a class="nav-link" href="/">
            Apresentação
        </a>
        <a class="nav-link" href="#">
            GitHub
        </a>
        <a class="nav-link active" aria-current="page" href="/login">
            Entrar
        </a>
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo width="72" height="72" />
            </a>
        </x-slot>

        <div class="mb-3">
            <span class="d-block">{{ __('Forgot your password?') }}</span>
            {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-3" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-3" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
