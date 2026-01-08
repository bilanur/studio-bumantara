@props(['align' => 'right', 'width' => '48'])

<div x-data="{ open: false }" class="relative">
    <div @click="open = !open">
        {{ $trigger }}
    </div>

    <div x-show="open" @click.outside="open = false"
        class="absolute z-50 mt-2 w-{{ $width }} rounded-md shadow-lg bg-white">
        {{ $content }}
    </div>
</div>
