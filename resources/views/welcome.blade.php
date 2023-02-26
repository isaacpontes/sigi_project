<x-guest-layout>
    <x-slot name="navlinks">
        <a class="nav-link active" aria-current="page" href="/">
            {{ __("welcome.introduction") }}
        </a>
        <a class="nav-link" href="https://github.com/isaacpontes/sigi_project" target="_blank">
            GitHub
        </a>
        <a class="nav-link" href="/login">
            {{ __("welcome.sign_in") }}
        </a>
    </x-slot>

    <h1 class="fw-bold mb-4">{{ __("welcome.homepage_headline") }}</h1>
    <p class="lead mb-4">{{ __("welcome.homepage_subheadline") }}</p>
    <p class="lead">
        <a href="/login" class="btn btn-lg btn-light fw-bold">{{ __("welcome.sign_in") }}</a>
    </p>
</x-guest-layout>
