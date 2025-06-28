@extends('layouts.app')


@section('body_content')
 
<div class=" px-16 py-8  bg-white dark:bg-gray-900"
style=" background-image: url('{{ asset('images/hh1.jpg') }}'); background-size: cover; background-position: center;">
  <h1 class="mb-4 pt-6 text-4xl font-extrabold text-center leading-none tracking-tight text-green-900 md:text-4xl lg:text-4xl dark:text-white">
    Discover the Timeless Elegance of Craftopia's Crochet Collection
  </h1>
  <p class="mb-3 px-6 text-xl font-extrabold  text-green-900 dark:text-gray-400">
    Immerse yourself in the delicate artistry of handmade crochet creations. At Craftopia, we bring you an exclusive selection of meticulously crafted crochet home decor items—each piece woven with love, tradition, and creativity to add warmth and charm to your space.
  </p>
  <div class="grid grid-cols-1 md:gap-6 md:grid-cols-2">
      <p class="mb-3 px-6 text-xl font-extrabold  text-green-900 dark:text-gray-400">
          Explore a world of intricately designed crochet masterpieces, from elegant table runners and cozy blankets to charming wall hangings and decorative baskets. Our collection celebrates the beauty of artisanal craftsmanship, turning every stitch into a statement of style and comfort.
      </p>
      <blockquote class="mb-2">
          <p class="text-3xl italic font-extrabold text-green-800 dark:text-white">
              "Craftopia's crochet collection is a testament to the beauty of handmade artistry. Each piece carries a story, adding a unique and heartfelt touch to any home."
          </p>
      </blockquote>
  </div>
  <p class="mb-3 px-6 text-xl font-extrabold  text-green-900 dark:text-gray-400">
    Elevate your home with the warmth and elegance of handcrafted crochet decor. Whether you're looking for a vintage aesthetic or a modern touch with a rustic charm, our collection is designed to inspire and transform your living space.
  </p>

  <!-- Button Section -->
<div class="flex flex-col pb-2 pt-4  space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
  <a href="#"
    class="inline-flex justify-center items-center  py-3 px-5 text-base font-medium text-white rounded-lg bg-green-800 hover:bg-gray-500 focus:ring-4 focus:ring-yellow-600 dark:focus:ring-primary-900">
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
     @endsection