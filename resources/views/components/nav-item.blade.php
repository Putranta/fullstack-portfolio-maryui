@props(['url', 'active' => false])

@php
    $classes = ($active == false)? 'hover:bg-base-200 py-1 px-3 rounded-full transition duration-200 flex items-center gap-2' : 'bg-base-200 backdrop-blur-md py-1 px-3 rounded-full transition duration-200 flex items-center gap-2';
@endphp

<a href="{{$url}}" wire:navigate {{ $attributes->merge(['class'=>$classes])}}>
    {{ $slot }}
</a>
