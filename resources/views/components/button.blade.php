<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-lg btn-primary w-100']) }}>
    {{ $slot }}
</button>
