<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex justify-center p-3 font-medium rounded bg-primary text-gray hover:bg-opacity-90']) }}>
    {{ $slot }}
</button>
