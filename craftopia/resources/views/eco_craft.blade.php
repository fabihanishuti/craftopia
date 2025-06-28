@extends('layouts.app')


@section('body_content')
 
<div class=" px-16 py-8  bg-white dark:bg-gray-900"
style=" background-image: url('{{ asset('images/ee3.jpg') }}'); background-size: cover; background-position: center;">
  <h1 class="mb-4 pt-6 text-4xl font-extrabold text-center leading-none tracking-tight text-gray-900 md:text-4xl lg:text-4xl dark:text-white">
    Embrace Sustainability with Craftopia's Eco-Friendly Creations
  </h1>
  <p class="mb-3 px-6 text-xl font-extrabold  text-gray-900 dark:text-gray-400">
    Discover a world where art meets sustainability. At Craftopia, we transform recycled materials into breathtaking handmade crafts that inspire a greener tomorrow.
  </p>
  <div class="grid grid-cols-1 md:gap-6 md:grid-cols-2">
      <p class="mb-3 px-6 text-xl font-extrabold  text-gray-900 dark:text-gray-400">
        From upcycled home décor and stylish accessories to handcrafted wonders made from natural elements, our collection celebrates eco-conscious artistry. Each piece is a testament to ethical craftsmanship and mindful living.
      </p>
      <blockquote class="mb-2">
          <p class="text-3xl italic font-extrabold text-gray-800 dark:text-white">
            "Sustainable elegance, crafted with love. Every creation tells a story of nature, art, and responsibility."
          </p>
      </blockquote>
  </div>
  <p class="mb-3 px-6 text-xl font-extrabold  text-gray-900 dark:text-gray-400">
    Elevate your lifestyle with our eco-chic designs—thoughtfully handmade to bring beauty into your home while protecting the planet. Join us in reimagining waste into wonders, one craft at a time.
  </p>

  <!-- Button Section -->
<div class="flex flex-col pb-2 pt-4  space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
  <a href="#"
    class="inline-flex justify-center items-center  py-3 px-5 text-base font-medium text-white rounded-lg bg-gray-800 hover:bg-gray-500 focus:ring-4 focus:ring-yellow-600 dark:focus:ring-primary-900">
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