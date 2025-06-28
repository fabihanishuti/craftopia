@extends('layouts.app')

@section('body_content')
<div class="max-w-screen mx-auto w-full h-full bg-purple-50 rounded-lg shadow-md">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6">

    <!-- Left: Images -->
    <div class="flex gap-4 mx-6">
      <div id="images" class="flex flex-col gap-3 h-96 overflow-y-auto">
        <div class="bg-white rounded-md shadow p-3 flex items-center justify-center">
          <!-- Ensure the correct path here -->
          <img class="w-40 h-40 object-cover" src="{{ asset('uploads/products/' . $product->picture) }}" alt="{{ $product->title }}" />
        </div>
      </div>

      <div class="h-96 relative bg-white rounded-md shadow-md p-3 flex items-center justify-center">
        <!-- Ensure the correct path here -->
        <img id="bigImage" class="h-full object-cover" src="{{ asset('uploads/products/' . $product->picture) }}" alt="Product Image">
      </div>
    </div>

    <!-- Right: Details -->
    <div>
      <h2 class="text-2xl font-semibold">{{ $product->title }}</h2>
      <div class="mt-2 sm:items-center sm:gap-4 sm:flex">
        <p class="text-2xl font-extrabold text-gray-900 mt-2">${{ number_format($product->price, 2) }} </p>
      </div>


      <div class="flex items-center gap-2 mt-2 sm:mt-3">
        <div class="flex items-center gap-1">
          <!-- Stars Icon (Placeholder for Dynamic Rating) -->
          <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
          </svg>
          <p id="productRating" class="text-sm font-medium leading-none text-gray-500 dark:text-gray-400">
            (5.0)
          </p>
          <a href="#" class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline dark:text-white">
            345 Reviews
          </a>
        </div>
      </div>

      <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
       
        <form action="{{ route('addToCart') }}" method="POST" class="flex flex-col gap-3 md:flex-row md:items-center">
          @csrf
      
          <input type="hidden" name="id" value="{{ $product->id }}">
      
          <!-- Quantity Selector -->
          <label for="counter-input" class="sr-only">Choose quantity:</label>
          <div class="flex items-center">
              <!-- Decrement Button -->
              <button type="button" id="decrement-button" data-input-counter-decrement="counter-input" class="inline-flex h-7 w-7 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                  <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                  </svg>
              </button>
      
              <!-- Quantity Input -->
              <input
                  type="number"
                  name="quantity"
                  id="counter-input"
                  data-input-counter
                  class="w-12 border-0 bg-transparent text-center text-sm font-medium text-gray-900 dark:text-white focus:outline-none focus:ring-0"
                  min="1"
                  max="{{ $product->quantity }}"
                  value="1"
                  required
              />
      
              <!-- Increment Button -->
              <button type="button" id="increment-button" data-input-counter-increment="counter-input" class="inline-flex h-7 w-7 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                  <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                  </svg>
              </button>
          </div>
      
          <!-- Submit Button -->
          <button type="submit" name="addToCart" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 flex items-center justify-center">
              <svg class="w-5 h-5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"/>
              </svg>
              Add to cart
          </button>
      </form>

       <!-- Add to Favorites -->
       <a href="#" title="" class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-white focus:outline-none bg-gray-900 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
        <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
        </svg>
        Add to favorites
      </a>
      
      
      </div>

      <p class="mt-6 text-gray-500">{{ $product->description }}</p>
    </div>
  </div>

  <!-- Related Products Section -->
  @if($related->count())
  <div class="mt-10 mb-6 px-6 py-4">
    <h3 class="text-2xl font-extrabold text-gray-800 dark:text-white mb-4">Related Products</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      @foreach ($related as $product)
        <div class="rounded-lg border border-gray-400 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
          <a href="{{ route('product.detail', $product->id) }}" class="block">
            <div class="h-56 w-full">
              <img src="{{ asset('uploads/products/' . $product->picture) }}" alt="{{ $product->title }}" class="w-full h-60 object-contain">
            </div>
            <div class="pt-6">
              <div class="mb-4 flex items-center justify-between gap-4">
                <span class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
                  {{ $product->title }}
                </span>
                <div class="flex items-center justify-end gap-1">
                  <button type="button" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Quick look</span>
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" stroke-width="2"/>
                      <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" stroke-width="2"/>
                    </svg>
                  </button>
                  <button type="button" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Add to Favorites</span>
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                    </svg>
                  </button>
                </div>
              </div>

              <div class="mt-2 flex items-center gap-2">
                <div class="flex items-center">
                  @for($i = 0; $i < 5; $i++)
                    <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                    </svg>
                  @endfor
                </div>
                <p class="text-sm font-medium text-gray-900 dark:text-white">5.0</p>
              </div>

              <ul class="mt-2 flex items-center gap-4">
                <li class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                  <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                  </svg>
                  Fast Delivery
                </li>
                <li class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                  <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                  </svg>
                  Best Price
                </li>
              </ul>

              <div class="mt-4 flex items-center justify-between gap-4">
                <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">
                  ${{ number_format($product->price, 2) }}
                </p>
                <a href="{{ route('shopping_cart') }}" class="inline-flex items-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                  <svg class="-ms-2 me-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"/>
                  </svg>
                  Add to cart
                </a>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
@endif

</div>
@endsection
