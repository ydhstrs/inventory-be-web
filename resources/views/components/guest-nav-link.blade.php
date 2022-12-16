@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-primaryColor p-2 rounded-lg'
            : 'p-2 rounded-lg';
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</li>
