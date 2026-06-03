@props(['active'])

@php
$classes = ($active ?? false)
    ? 'px-4 py-2 rounded-xl bg-green-100 text-green-700 font-semibold'
    : 'px-4 py-2 rounded-xl text-gray-600 hover:bg-gray-100 hover:text-green-700 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
