<div class="rounded-lg border border-gray-400 bg-white p-6 mt-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
    <a href="{{ route('product.detail', $product->id) }}" class="block"> 
        <div class="h-56 w-full">
            <img src="{{ asset('uploads/products/' . $product->picture) }}" alt="{{ $product->title }}" class="w-full h-60 object-contain">
        </div>
        <div class="pt-6">
            <div class="mb-4 flex items-center justify-between gap-4">
                <span a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
                    {{ $product->title }}
                </a>
                </span>

                <div class="flex items-center justify-end gap-1">
                    <a href="{{ route('product.detail', $product->id) }}">
                        <button type="button" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Quick look</span>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" stroke-width="2"/>
                                <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" stroke-width="2"/>
                            </svg>
                        </button>
                    </a>
                    

                    <!-- Add to Favorites -->
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
                {{-- <p class="text-sm font-medium text-gray-500 dark:text-gray-400">(455)</p> --}}
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

                <a href="{{ route('product.detail', $product->id) }}" class="inline-flex items-center rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
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
