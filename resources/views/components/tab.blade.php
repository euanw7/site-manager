<li class="me-2">
    <button {{ $attributes->merge(['class' => 'inline-block p-4 text-sm font-medium border-b-2 focus:outline-none focus:ring-0']) }}>
        {{ $slot }}
    </button>
</li>