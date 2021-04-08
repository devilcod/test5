<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Products') }}
        </h2>
    </x-slot>
    <div class="mt-10 mb-5 px-5 py-8 sm:mt-0 py-2">
        {{-- <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
              <p class="mt-1 text-sm text-gray-600">
                Use a permanent address where you can receive mail.
              </p>
            </div>
          </div> --}}
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="createProduct">
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="first_name" class="block text-sm font-medium text-gray-700">Name</label>
                      <input type="text" wire:model="name"name="first_name" id="first_name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $product->name }}
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="country" class="block text-sm font-medium text-gray-700">Category</label>
                      <select wire:model="category_id" id="category_id" name="category_id" autocomplete="" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="disabled">&NonBreakingSpace;choose one</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    
                    <div class="col-span-6">
                      <label for="street_address" class="block text-sm font-medium text-gray-700">Description</label>
                      <input type="text" wire:model="description" name="street_address" id="street_address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    {{ $product->description }}
                    </div>
      
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                      <label for="city" class="block text-sm font-medium text-gray-700">Price</label>
                      <input type="text" wire:model="price" name="city" id="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    {{ $product->price }}
                    </div>
      
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                      <label for="state" class="block text-sm font-medium text-gray-700">Another Example</label>
                      <input type="text" wire:model="photo" name="state" id="state" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    {{ $product->photo }}
                    </div>
      
                    {{-- <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                      <label for="postal_code" class="block text-sm font-medium text-gray-700">ZIP / Postal</label>
                      <input type="text" name="postal_code" id="postal_code" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div> --}}
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  {{-- <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                  </button> --}}
                  <x-button>{{ __('Save') }}</x-button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
