<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Orders') }}
        </h2>
    </x-slot>
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('create.order') }}" :active="request()->routeIs('order.create')" class="mt-5 mb-5 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">{{ __('Add') }}</a>
    <div>
</div>
