<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Products') }}
        </h2>
    </x-slot>
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <x-button wire:click="$emit('openModal', 'product.create-product')" class="mt-5 mb-5">{{ __('Add') }}</x-button> 
      <div>
  </div>
        <div class="flex flex-col">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 ">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Description
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Created at
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Updated at
                      </th>
                      <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                      @forelse ($products as $product)
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                          <div class="flex-shrink-0 h-10 w-10">
                            {{-- <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt=""> --}}
                            <img class="h-10 w-10 rounded-full" src="{{ 'storage' }}/{{ $product->photo }}">
                          </div>
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                              {{ $product->name }}
                            </div>
                            <div class="text-sm">
                              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                {{ $product->price }}
                              </span>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-wrap">
                        <div class="text-sm text-gray-900">{{ $product->description }}</div>
                        {{-- <div class="text-sm text-gray-500">Optimization</div> --}}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                          {{ $product->created_at->diffForHumans() }}
                        </span>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                        {{ $product->updated_at->diffForHumans() }}
                      </span>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button wire:click="$emit('openModal', 'product.edit-product', {{ json_encode(["product" => $product->id]) }})" class="text-indigo-600 hover:text-indigo-900" >Edit</button>
                        <span>|</span>
                        <button wire:click="$emit('openModal', 'product.delete-product', {{ json_encode(["product" => $product]) }})" class="text-indigo-600 hover:text-indigo-900" >Delete</button>
                      </td>
                    </tr>
                    @empty
                    <td colspan="4">
                      <span class="px-2 inline-flex text-md leading-5 font-semibold rounded-full bg-gray-100 text-red-500">
                      There's No Product Yet
                    </span>
                  </td>
                    @endforelse
        
                    <!-- More items... -->
                  </tbody>
                </table>
                <div class="mt-2 px-2 mb-3">{{ $products->links() }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>