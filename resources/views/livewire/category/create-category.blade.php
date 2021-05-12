<div>
<x-modal form-action="createCategory">
    <x-slot name="title">
        Create Category
    </x-slot>

    <x-slot name="content">
        <x-label for="name" :value="__('Name')" />

        <x-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        <x-label for="category_id" :value="__('Select Parent')" />
            <select wire:model="category_id" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="disabled">&NonBreakingSpace;Choose One</option>  
                @forelse ($categories as $category )
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @empty
                    <span>Empty</span>
                @endforelse
            </select>
    </x-slot>

    <x-slot name="buttons">
        <x-flat-button wire:click="$emit('closeModal')">Cancel</x-button>
        <x-button type="submit" class="mr-5">{{ __('Create') }}</x-button>
    </x-slot>
</x-modal>
</div>