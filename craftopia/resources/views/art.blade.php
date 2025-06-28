@extends('layouts.app')


@section('body_content')
 
<div class=" px-16 py-8  bg-white dark:bg-gray-900"
style=" background-image: url('{{ asset('images/aa3.jpg') }}'); background-size: cover; background-position: center;">
<h1 class="mb-4 pt-6 text-5xl font-extrabold text-center leading-none tracking-tight  text-blue-900 md:text-5xl lg:text-5xl dark:text-white">
  Discover the Artistry of Craftopia
</h1>

<p class="mb-6 text-center text-2xl font-extrabold text-blue-900 lg:text-2xl sm:px-16 xl:px-48 dark:text-gray-400">
  Welcome to Craftopia – where passion meets creativity. Explore a mesmerizing collection of handmade paintings, intricate sketches, and uniquely crafted decor, each piece telling a story of artistry and dedication.
</p>

<p class=" text-center text-xl font-extrabold text-blue-900 dark:text-gray-400">
  Every creation at Craftopia is a testament to the beauty of handcrafted excellence. From delicate brush strokes to meticulously sculpted designs, our collection celebrates the skill and soul of artisans who pour their hearts into every masterpiece.
</p>

<div class="inline-flex items-center justify-center w-full">
  <hr class="w-64 h-1 my-8 bg-blue-900 border-0 rounded-sm dark:bg-gray-700">
  <div class="absolute px-4 -translate-x-1/2 bg-blue-100 left-1/2 dark:bg-gray-900">
      <svg class="w-4 h-4 text-blue-900 dark:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
          <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
      </svg>
  </div>
</div>

<p class=" text-center text-xl font-extrabold text-blue-900 dark:text-gray-400">
  Enhance your space with timeless artistry. Whether you're seeking a captivating painting, a delicate handmade sketch, or an exquisite handcrafted decor piece, Craftopia offers an exclusive selection designed to inspire and elevate.
</p>

<!-- Button Section -->
<div class="flex flex-col pb-2 pt-4  space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
  <a href="#"
    class="inline-flex justify-center items-center  py-3 px-5 text-base font-medium text-white rounded-lg bg-gray-700 hover:bg-gray-500 focus:ring-4 focus:ring-yellow-600 dark:focus:ring-primary-900">
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
<div class="w-full h-10 bg-yellow-200">
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
    
     @foreach ($artProducts as $product)
    <x-product.card :product="$product" />
@endforeach
  </div>
</div>
     @endsection