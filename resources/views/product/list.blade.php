
@extends('layouts.app')
@section('content')
<div class="grid grid-cols-1 gap-4 lg:grid-cols-3 sm:grid-cols-2 ">
    @foreach($products as $product)
    <div class="w-full px-4 lg:px-0">
        <div class="p-3 bg-white rounded shadow-md">
            <div class="">
                <div class="relative w-full mb-3 h-62 lg:mb-0">
                    <img src="https://cdn.pixabay.com/photo/2018/02/25/07/15/food-3179853__340.jpg" alt="Just a flower"
                         class="object-fill w-full h-full rounded">
                </div>
                <div class="flex-auto p-2 justify-evenly">
                    <div class="flex flex-wrap ">
                        <div class="flex items-center justify-between w-full min-w-0 ">
                            <h2 class="mr-auto text-lg cursor-pointer hover:text-gray-900 ">
                                {{ $product->name }}
                            </h2>
                        </div>
                    </div>
                    <div class="mt-1 text-xl font-semibold">$3.00</div>
                    <x-responsive-nav-link :href="route('make.payment')">
                        <x-primary-button class="ml-4" >
                            {{ __('Buy') }}
                        </x-primary-button>
                    </x-responsive-nav-link>

                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
