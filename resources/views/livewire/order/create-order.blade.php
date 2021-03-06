<div>
    <div class="flex mt-5 ml-5 h-screen fixed">
        <div class="flex grid grid-cols-4 gap-6 w-2/3 h-4/5 overflow-scroll">
            @forelse ($products as $product)
            <div class="bg-gray-200 rounded-2xl">
                <img src="{{ asset('storage/' .$product->photo) }}" alt="" class="rounded-2xl">
                <div class="px-2 ">
                    <p class="text-sm">{{ $product->name }}</p>
                    <span class="text-sm">{{ $product->price }}</span>
                    <x-button wire:click.prevent="addToCart({{ $product->id }})" class="ml-4 mb-2">Add</x-button>
                </div>
            </div>
            @empty
                <p>There is no product yet</p>
            @endforelse
            
        </div>
    <div class="inline-block px-2 ml-5 mr-2 px-4 py-4 bg-red-300 w-1/3 rounded-2xl">
        <div class="">
            <p class="text-xl font-bold">Order Summary</p>
            <span>Kentut Kafe</span>
            <span class="inline-block ml-36 ">Table Number : 01</span>
        </div>
        <div class="order-chart overflow-scroll ">
            <div class="w-16 h-72 bg-blue-200">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum asperiores, animi beatae excepturi odit expedita nisi dicta non facilis quas alias velit voluptatibus cupiditate est placeat, libero magnam dignissimos impedit.
            </div>
        </div>
    </div>
</div>
</div>
