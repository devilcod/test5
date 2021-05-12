<div>
  <x-modal form-action="editProduct">
      <x-slot name="title">
          Update Product
      </x-slot>
  
      <x-slot name="content">
          <x-label for="name" :value="__('Name')" />
          <x-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            @error('name')
              <div class="block text-sm font-sm text-red-500">{{ $message }}</div>
            @enderror
            <x-label for="name" :value="__('Description')" />
  
          <x-input wire:model="description" id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
            @error('description')
              <div class="block text-sm font-sm text-red-500">{{ $message }}</div>
            @enderror

            <x-label for="name" :value="__('Price')" />
            <x-input wire:model="price" id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autofocus />
            @error('price')
              <div class="block text-sm font-sm text-red-500">{{ $message }}</div>
            @enderror

          <x-label for="category_id" :value="__('Select a Category')" />
              <select wire:model="category_id" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="disabled">&NonBreakingSpace;Choose One</option>  
                @forelse ($categories as $category )
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @empty
                      <span>Empty</span>
                  @endforelse
              </select>
              <a wire:click="$emit('openModal', 'category.create-category')" class="inline text-blue-400 text-sm py-5 ml-2 shadow-sm border-gray-200" role="button">Create</a>

              <x-label for="name" :value="__('Another Example')" />
              <x-input wire:model="photo" id="photo" class="block mt-1 w-full" type="text" name="photo" :value="old('photo')" required autofocus />
            @error('photo')
              <div class="block text-sm font-sm text-red-500">{{ $message }}</div>
            @enderror
      </x-slot>
  
      <x-slot name="buttons">
          <x-flat-button wire:click="$emit('closeModal')">Cancel</x-button>
          <x-button type="submit" class="mr-5">{{ __('Update') }}</x-button>
      </x-slot>
  </x-modal>
  </div>