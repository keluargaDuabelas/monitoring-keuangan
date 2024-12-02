<x-filament::layouts.card>
    <div class="w-full flex justify-center mb-6">
        <img src="{{ $logo }}" alt="Logo" class="w-32">
    </div>

    {{ $this->form }}

    <x-filament::button type="submit" form="authenticate">
        {{ __('Login') }}
    </x-filament::button>
</x-filament::layouts.card>
