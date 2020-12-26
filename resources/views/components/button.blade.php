<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block']) }}>
    {{ $slot }}
</button>
