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

        <div class="mb-4">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-success">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-button type="submit" class="btn-danger mt-4">
                    {{ __('Logout') }}
                </x-button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
