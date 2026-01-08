@props(['active'])

<a {{ $attributes->merge([
    'class' => ($active ?? false)
        ? 'block ps-3 pe-4 py-2 border-l-4 border-indigo-400 bg-indigo-50 text-indigo-700'
        : 'block ps-3 pe-4 py-2 border-l-4 border-transparent text-gray-600 hover:bg-gray-50'
]) }}>
    {{ $slot }}
</a>
