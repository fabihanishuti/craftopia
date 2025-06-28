@extends('layouts.app')


@section('body_content')
 
<section>
<div class=" mx-auto max-w-scree bg-white dark:bg-gray-900">

<h1 class="mb-4 pt-6 text-3xl font-extrabold text-center leading-none tracking-tight  text-blue-900 md:text-3xl lg:text-3xl dark:text-white">
  Discover the Artistry of Craftopia
</h1>


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
</section>

<section>
  <div class=" mx-auto max-w-scree bg-white dark:bg-gray-900">

    <h1 class="mb-4 pt-6 text-3xl font-extrabold text-center leading-none tracking-tight text-green-900 md:text-3xl lg:text-3xl dark:text-white">
      Discover the Timeless Elegance of Craftopia's Crochet Collection
    </h1>

    <div class="w-full h-10  bg-green-200">
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

    <div class="max-w-screen mx-auto w-full h-full pt-4 pb-8 bg-green-50 rounded-lg shadow-md">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6  px-4">
        @foreach ($decorProducts as $product)
        <x-product.card :product="$product" />
    @endforeach
    
    
      </div>
    </div>
</section>


<section>
  <div class=" mx-auto max-w-scree bg-white dark:bg-gray-900">

    <h1 class="text-purple-900 text-center dark:text-white text-3xl md:text-3xl font-extrabold mb-4 pt-4">Elegant Handmade Accessories</h1>

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
</section>

<section>
  <div class=" mx-auto max-w-scree bg-white dark:bg-gray-900">

    <h1 class="mb-4 pt-4 text-3xl font-extrabold text-center leading-none tracking-tight text-gray-900 md:text-3xl lg:text-3xl dark:text-white">
      Embrace Sustainability with Craftopia's Eco-Friendly Creations
    </h1>

    <div class="w-full h-10  bg-gray-400">
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

    <div class="max-w-screen mx-auto w-full h-full pt-4 pb-8 bg-green-50 rounded-lg shadow-md">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6  px-4">
      
    @foreach ($ecoCrafts as $product)
    <x-product.card :product="$product" />
@endforeach

    
      </div>
    </div>




     @endsection