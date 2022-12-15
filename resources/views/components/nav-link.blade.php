@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex bg-primaryColor text-white items-center p-2 text-base text-white font-normal text-gray-900 rounded-lg  hover:bg-gray-100'
            : 'flex text-white items-center p-2 text-base text-white font-normal text-gray-900 rounded-lg  hover:bg-gray-100';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
