@props(['value'])

<label {{ $attributes->merge(['class' => 'd-block font-weight-normal']) }}>
    {{ $value ?? $slot }}
</label>
