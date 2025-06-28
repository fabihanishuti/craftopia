<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- <title>{{ config('app.name') }}</title> --}}
    <title>Craftopia</title>

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  @stack('css')
  @vite(['resources/css/app.css','resources/css/app.css'])

</head>

<body>
  @yield('content')

  <nav class="bg-yellow-50 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <!-- Left Section: Logo & Nav Links -->
        <div class="flex items-center space-x-2">
          <a href="{{ url('/') }}" class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.jpg') }}" alt="Craftopia Logo" class="h-10 w-10">
            <span class="text-2xl font-bold text-yellow-900">Craftopia</span>
          </a>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-6 items-center">
          <a href="{{ route('home') }}" class="text-red-600 font-semibold hover:text-purple-600">Home</a>

          <!-- Shop Dropdown -->
          <!-- Shop Dropdown -->
          <div class="relative">
            <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
              class="text-red-600 font-semibold hover:text-purple-600 focus:ring-4 focus:outline-none focus:ring-yellow-50 font-semibold rounded-lg ">
              Product ▾
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownHover"
              class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                <li>
                  <a href="{{ route('art') }}"
                    class="block px-4 py-2 hover:bg-purple-100 dark:hover:bg-gray-600 dark:hover:text-white">Art &
                    Paintings</a>
                </li>
                <li>
                  <a href="{{ route('home_decor') }}"
                    class="block px-4 py-2 hover:bg-purple-100 dark:hover:bg-gray-600 dark:hover:text-white">Home
                    Décor</a>
                </li>
                <li>
                  <a href="{{ route('accessories') }}"
                    class="block px-4 py-2 hover:bg-purple-100 dark:hover:bg-gray-600 dark:hover:text-white">Accessories</a>
                </li>
                <li>
                  <a href="{{ route('eco_craft') }}"
                    class="block px-4 py-2 hover:bg-purple-100 dark:hover:bg-gray-600 dark:hover:text-white">Eco-friendly
                    & Recycled Crafts</a>
                </li>
              </ul>
            </div>
          </div>

          <a href="{{ route('blog') }}" class="text-red-600 font-semibold hover:text-purple-600">Blog
            </a>
          <a href="{{ route('about') }}" class="text-red-600 font-semibold hover:text-purple-600">About Us</a>
          <a href="{{ route ('contact') }}" class="text-red-600 font-semibold  hover:text-purple-600">Contact</a>
        </div>

        <!-- Right Section: Search, Cart, Wishlist, Profile -->
        <div class="flex items-center space-x-4">
          <!-- Search Bar -->
          <div class="relative hidden md:block">
            <input type="text" placeholder="Search..."
              class="border rounded-md px-3 py-1 text-gray-700 focus:outline-none">
          </div>

          <!-- Icons -->
          <div class="relative inline-block">
            <button class="text-red-600 font-semibold hover:text-purple-600 flex items-center" data-dropdown-toggle="cartDropdown">
              🛒 <span class="hidden md:inline">Cart</span>
              <!-- Dropdown Icon -->
              <svg class="w-2.5 h-2.5 ml-2 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 4 4 4-4" />
              </svg>
            </button>
          
            <!-- Dropdown Menu -->
            <div id="cartDropdown"
              class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-md w-44 dark:bg-gray-700">
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="cartDropdownButton">
                <!-- Cart Link -->
                <li>
                  <a href="{{ route('shopping_cart') }}"
                    class="flex items-center block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l3 9h9l3-9h2M5 3l1.618 4.354L9 11h6l2.382-3.646L19 3m-7 4h4M5 3h14l-2 10H7z" />
                    </svg>
                    Cart
                  </a>
                </li>
                <!-- Order History Link -->
                <li>
                  <a href="{{ route ('myOrders')}}"
                    class="flex items-center block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6M9 16h6M9 8h6m4 2H5m4 12h8m4 0H5m4-4h8" />
                    </svg>
                    Order History
                  </a>
                </li>
              </ul>
            </div>
          </div>
          

          
          <a href="{{ url('/wishlist') }}" class="text-red-600 font-semibold hover:text-purple-600">
            ❤️ <span class="hidden md:inline">Wishlist</span>
          </a>



          @php
          use Illuminate\Support\Facades\Auth;
        @endphp
        
<!-- Profile Dropdown -->
<div class="relative">
  <button id="profileDropdownButton" data-dropdown-toggle="profileDropdown"
    class="text-red-600 font-semibold hover:text-purple-600 inline-flex items-center px-4 py-2 text-sm rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-50"
    type="button">
    👤 <span class="hidden md:inline">Profile</span>
    <svg class="w-2.5 h-2.5 ml-2 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
      viewBox="0 0 10 6">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="m1 1 4 4 4-4" />
    </svg>
  </button>

  <!-- Dropdown menu -->
  <div id="profileDropdown"
    class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-md w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="profileDropdownButton">

      @if (session()->has('id'))
        <!-- Settings -->
        <li>
          <a href="{{ route('settings') }}"
            class="flex items-center block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Settings
          </a>
        </li>

        <!-- Sign Out -->
        <li>
          <a href="{{ route('signout') }}"
            class="flex items-center block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4H4m0 0l3-3m-3 3l3 3" />
            </svg>
            Sign out
          </a>
        </li>
      @else
        <!-- Sign In -->
        <li>
          <a href="{{ route('signin') }}"
            class="flex items-center block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12H9m6 4l4-4m0 0l-4-4m4 4H3" />
            </svg>
            Sign in
          </a>
        </li>

        <!-- Sign Up -->
        <li>
          <a href="{{ route('signup') }}"
            class="flex items-center block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 3v9m0 0l4-4m-4 4l-4-4m9 9h-6m6 0l-3 3m3-3l-3-3" />
            </svg>
            Sign up
          </a>
        </li>
      @endif

    </ul>
  </div>
</div>

        




          <!-- Mobile Menu Button -->
          <button class="md:hidden focus:outline-none" id="mobile-menu-button">
            ☰
          </button>
        </div>
      </div>

      <!-- Mobile Menu -->
      <div class="hidden md:hidden bg-white py-2 space-y-2" id="mobile-menu">
        <a href="{{ url('/') }}" class="block text-gray-700 px-4 py-2">Home</a>
        <a href="{{ url('/shop') }}" class="block text-gray-700 px-4 py-2">Shop</a>
        <a href="{{ url('/new-arrivals') }}" class="block text-gray-700 px-4 py-2">New Arrivals</a>
        <a href="{{ url('/about') }}" class="block text-gray-700 px-4 py-2">About Us</a>
        <a href="{{ url('/contact') }}" class="block text-gray-700 px-4 py-2">Contact</a>
      </div>
    </div>
  </nav>

  <main>
    @yield('body_content')
  </main>


  <footer class="bg-gray-600 shadow dark:bg-gray-900">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="{{ url('/') }}" class="flex items-center mb-4 sm:mb-0">
                <img src="{{ asset('images/logo.jpg') }}" class="h-12 mr-3" alt="Craftopia Logo" />
                <span class="self-center text-3xl text-yellow-600 font-extrabold whitespace-nowrap dark:text-white">Craftopia</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-lg font-bold text-white sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="{{ route('products') }}" class="mr-4 hover:underline md:mr-6">Shop</a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="mr-4 hover:underline md:mr-6">About Us</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="mr-4 hover:underline md:mr-6">Contact</a>
                </li>
                <li>
                    <a href="{{ url('/faq') }}" class="hover:underline">FAQ</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-lg text-white sm:text-center dark:text-gray-400">
                © {{ now()->year }} <a href="{{ url('/') }}" class="hover:underline">Craftopia</a>. All Rights Reserved.
            </span>
            <div class="flex mt-4 pr-2 space-x-6 sm:justify-center sm:mt-0">
                <a href="#" class="text-white hover:text-gray-900 dark:hover:text-white">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-900 dark:hover:text-white">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-900 dark:hover:text-white">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-900 dark:hover:text-white">
                    <i class="fab fa-pinterest"></i>
                </a>
            </div>
        </div>
    </div>
</footer>


<script>
  // Mobile menu toggle
    document.getElementById("mobile-menu-button").addEventListener("click", function() {
        document.getElementById("mobile-menu").classList.toggle("hidden");
    });
</script>

<script src="{{ mix('js/app.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script> --}}

<script src="{{ asset('vendor/flowbite/flowbite.min.js') }}"></script>


@stack('scripts')
</body>

</html>