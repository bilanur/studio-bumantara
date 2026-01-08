@props(['messages'])

@if ($messages)
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600 mt-1']) }}>
        @foreach ((array) $messages as $message)
            {{ $message }}
        @endforeach
    </p>
@endif
