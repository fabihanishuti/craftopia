@extends('layouts.app')


@section('body_content')
 
<div class=" px-16 py-8 h-70 bg-white dark:bg-gray-900"
style=" background-image: url('{{ asset('images/oo5.jpg') }}'); background-size: cover; background-position: center;">

          <h1 class="text-purple-900 text-center dark:text-white text-3xl md:text-5xl font-extrabold mb-2">Elegant Handmade Accessories</h1>
          <p class="text-2xl text-center font-semibold text-purple-800 dark:text-gray-400 mb-6">Discover handcrafted earrings, necklaces, and bracelets designed with passion, creativity, and a touch of magic.</p>
            <!-- Button Section -->
<div class="flex flex-col pb-2 pt-4  space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
  <a href="#"
    class="inline-flex justify-center items-center  py-3 px-5 text-base font-medium text-white rounded-lg bg-purple-800 hover:bg-gray-500 focus:ring-4 focus:ring-yellow-600 dark:focus:ring-primary-900">
    View More
    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
      aria-hidden="true">
      <path fill-rule="evenodd"
        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
        clip-rule="evenodd"></path>
    </svg>
  </a>
</div>
      </div>
      <div class="grid md:grid-cols-2 gap-8">
          <div class="bg-purple-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
             
              <h2 class="text-purple-900 dark:text-white text-3xl font-extrabold mb-2">Boho Charm & Minimalist Magic</h2>
              <p class="text-xl font-normal text-purple-900 dark:text-gray-400 mb-4">Effortless elegance with a touch of artistic expression. Explore handcrafted jewelry infused with soulful artistry.</p>
          </div>
          <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
            
              <h2 class="text-purple-900 dark:text-white text-3xl font-extrabold mb-2">Timeless Treasures</h2>
              <p class="text-xl font-normal text-purple-900 dark:text-gray-400 mb-4">Handmade with love, each piece carries warmth, creativity, and uniqueness to complement your beauty.</p>
          
          </div>
      </div>
    </div>


<div class="w-full h-10 bg-purple-400">
  <div class="grid max-w-xs grid-cols-3 gap-1 p-1 mx-auto my-2 h-10 bg-gray-100 rounded-lg dark:bg-gray-600" role="group">
      <button type="button" class="px-5 py-1.5 text-xs font-bold text-gray-900 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700 rounded-lg">
          New
      </button>
      <button type="button" class="px-5 py-1.5 text-xs font-bold text-white bg-gray-900 dark:bg-gray-300 dark:text-gray-900 rounded-lg">
          Popular
      </button>
      <button type="button" class="px-5 py-1.5 text-xs font-bold text-gray-900 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700 rounded-lg">
          Offer
      </button>
  </div>
</div>

<div class="max-w-screen mx-auto w-full h-full pt-4 pb-8 bg-purple-100 rounded-lg shadow-md">
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6  px-4">
    @foreach ($accessories as $product)
    <x-product.card :product="$product" />
@endforeach

  </div>
</div>
     @endsection