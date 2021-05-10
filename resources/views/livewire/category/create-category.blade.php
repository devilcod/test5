<x-modal form-action="createCategory">
    <x-slot name="title">
        Create Category
    </x-slot>

    <x-slot name="content">
        <x-label for="name" :value="__('Name')" />

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            
    </x-slot>

    <x-slot name="buttons">
        <x-button type="submit">{{ __('Create') }}</x-button>
        <x-button wire:click="$emit('closeModal')" class="ml-5">Cancel</x-button>
    </x-slot>
</x-modal>