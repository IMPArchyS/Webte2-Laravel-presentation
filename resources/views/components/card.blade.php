@props([
    'title' => null,
    'subtitle' => null,
])

<article
    {{ $attributes->merge(['class' => 'rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition hover:shadow-md dark:border-gray-700 dark:bg-gray-800']) }}>
    @if ($title)
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $title }}</h3>
    @endif

    @if ($subtitle)
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $subtitle }}</p>
    @endif

    <div class="mt-4 space-y-2 text-sm text-gray-700 dark:text-gray-300">
        {{ $slot }}
    </div>
</article>
