<div>
  <x-modal form-action="createProduct">
      <x-slot name="title">
          Create Product
      </x-slot>
  
      <x-slot name="content">
          <x-label for="name" :value="__('Name')" />
          <x-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus />
            @error('name')
              <div class="block text-sm font-sm text-red-500">{{ $message }}</div>
            @enderror

            <x-label for="name" :value="__('Description')" />
          <x-input wire:model="description" id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')"  autofocus />
            @error('description')
              <div class="block text-sm font-sm text-red-500">{{ $message }}</div>
            @enderror

            <x-label for="name" :value="__('Price')" />
            <x-input wire:model="price" id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')"  autofocus />
            @error('price')
              <div class="block text-sm font-sm text-red-500">{{ $message }}</div>
            @enderror

          <x-label for="category_id" :value="__('Select a Category')" />
              <select wire:model="category_id" id="category_id" name="category_id" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">&NonBreakingSpace;Choose One</option>  
                @forelse ($categories as $category )
                  <option value="{{ $category->id }}">{{ $category->name }} 
                  || {{ $category->where('id', $category->category_id)->value('name')}}
                  </option>
                  @empty
                      <span>Empty</span>
                  @endforelse
              </select>
              <a wire:click="$emit('openModal', 'category.create-category')" class="inline text-blue-400 text-sm py-5 ml-2 shadow-sm border-gray-200" role="button">Create</a>
              @error('category_id')
              <div class="block text-sm font-sm text-red-500">{{ $message }}</div>
            @enderror
              <x-label for="name" :value="__('Photo')" />
              {{-- <x-input wire:model="photo" id="photo" class="block mt-1 w-full" type="text" name="photo" :value="old('photo')"  autofocus /> --}}
            <div class="flex box-content h-32 w-32 bg-gray-200 rounded-2xl">
              @if($photo)
              <img src="{{ $photo->temporaryUrl() }}" class="rounded-2xl">
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
              <input type="file" wire:model="photo" id="photo" name="photo">

              <!-- Progress Bar -->
              <div x-show="isUploading">
                  <progress max="100" x-bind:value="progress" class="flex rounded bg-pink-500 shadow-none ">
                    <div class="relative pt-1">
                      <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200">
                        <div style="width:30%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
                      </div>
                    </div>
                  </progress>
              </div>
              @error('photo')
              <div class="block text-sm font-sm text-red-500">{{ $message }}</div>
            @enderror
            </div>
           
      </x-slot>
  
      <x-slot name="buttons">
          <x-flat-button type="button" wire:click="$emit('closeModal')">Cancel</x-button>
          <x-button type="submit" class="mr-5">{{ __('Create') }}</x-button>
      </x-slot>
  </x-modal>
  </div>