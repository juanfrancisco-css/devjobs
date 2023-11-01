@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 uppercase mb-2 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
