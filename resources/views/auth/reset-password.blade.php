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

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-3" :errors="$errors" />

    <form method="POST" action="{{ route('password.update') }}">
      @csrf

      <!-- Password Reset Token -->
      <input type="hidden" name="token" value="{{ $request->route('token') }}">

      <!-- Email Address -->
      <div>
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus />
      </div>

      <!-- Password -->
      <div class="mt-3">
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" type="password" name="password" required />
      </div>

      <!-- Confirm Password -->
      <div class="mt-3">
        <x-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-input id="password_confirmation" type="password" name="password_confirmation" required />
      </div>

      <div class="mt-4">
        <x-button>
            {{ __('Reset Password') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>
