@props(['name', 'show' => false, 'maxWidth' => '2xl'])

<div {{ $attributes }}>
    {{ $slot }}
</div>
