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
                  <option value="{{ $category->id }}" {{ $category->id == $currentCategory ? 'selected' : '' }}>{{ $category->name }}</option>
                  @empty
                      <span>Empty</span>
                  @endforelse
              </select>
              <a wire:click="$emit('openModal', 'category.create-category')" class="inline text-blue-400 text-sm py-5 ml-2 shadow-sm border-gray-200" role="button">Create</a>

              <x-label for="name" :value="__('Another Example')" />
              <div class="flex box-content h-32 w-32 bg-gray-200 rounded-2xl">
                @if($photo)
                <img src="{{ $photo->temporaryUrl() }}" alt="" class="rounded-2xl">
                @else
                <img src="{{ 'storage' }}/{{ $currentPhoto }}" alt="" class="rounded-2xl">
                @endif
              </div>
              <div
                x-data="{ isUploading: false, progress: 0 }"
                x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                <!-- File Input -->
                  <input type="file" wire:model="photo">

                  <!-- Progress Bar -->
                  <div x-show="isUploading">
                      <progress max="100" x-bind:value="progress"></progress>
                  </div>
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