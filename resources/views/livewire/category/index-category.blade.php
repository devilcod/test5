<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Categories') }}
        </h2>
    </x-slot>
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-button wire:click="$emit('openModal', 'category.create-category')" class="mt-5 mb-5">{{ __('Add') }}</x-button>
    <div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 bg-red-200">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 ">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-red-500">
              <table class="min-w-full divide-y divide-gray-200 bg-green-100">
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
                    @foreach ($categories as $category)
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            {{ $category->name }}
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        {{ $category->created_at->diffForHumans() }}
                      </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                      {{ $category->updated_at->diffForHumans() }}
                    </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      {{-- <a href="{{ route('product.edit',['product' => $product]) }}" class="text-indigo-600 hover:text-indigo-900" >Edit |</a>
                      <button wire:click="deleteProduct({{ $product->id }})" wire:loading.attr="disabled" class="text-indigo-600 hover:text-indigo-900" >Delete</button> --}}
                    </td>
                  </tr>
                  @endforeach
      
                  <!-- More items... -->
                </tbody>
              </table>
              {{-- <div class="mt-2 px-2 mb-3">{{ $products->links() }}</div> --}}
            </div>
          </div>
        </div>
      </div>
</div>
