@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css') }}">
@endpush

@push('scripts')

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('[data-carousel-item]');
    const nextButton = document.querySelector('[data-carousel-next]');
    const prevButton = document.querySelector('[data-carousel-prev]');
    const indicators = document.querySelectorAll('[data-carousel-slide-to]');
    
    let currentIndex = 0;

    function showSlide(index) {
      items.forEach((item, i) => {
        item.style.opacity = i === index ? '1' : '0';
        item.style.transition = 'opacity 0.7s ease';
      });

      indicators.forEach((indicator, i) => {
        indicator.classList.toggle('bg-yellow-400', i === index);
      });
    }

    nextButton.addEventListener('click', () => {
      currentIndex = (currentIndex + 1) % items.length;
      showSlide(currentIndex);
    });

    prevButton.addEventListener('click', () => {
      currentIndex = (currentIndex - 1 + items.length) % items.length;
      showSlide(currentIndex);
    });

    indicators.forEach((indicator, i) => {
      indicator.addEventListener('click', () => {
        currentIndex = i;
        showSlide(currentIndex);
      });
    });

    // Initialize the first slide
    showSlide(currentIndex);

    // Auto-slide functionality (optional)
    setInterval(() => {
      currentIndex = (currentIndex + 1) % items.length;
      showSlide(currentIndex);
    }, 5000); // Change slide every 5 seconds
  });
</script>
  
@endpush

@section('body_content')

<section class="bg-white dark:bg-gray-900"
style="background-image: url('{{ asset('images/n4.jpg') }}'); background-size: cover; background-position: center;">
<div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
  <a href="{{ route('product_detail')}}"
    class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-yellow-700 bg-yellow-50 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700"
    role="alert">
    <span class="text-xs bg-gray-100 rounded-full text-gray-900 px-4 py-1.5 mr-3">New</span> <span
      class="text-sm font-medium">Check out our latest collection of handmade treasures!</span>
    <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd"
        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
        clip-rule="evenodd"></path>
    </svg>
  </a>
  <h1
    class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl dark:text-white">
    Art & Creativity, Crafted Just for You</h1>
  <p class="mb-8 text-lg font-semibold text-white lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Craftopia
    brings creativity to life with unique handmade crafts, paintings, and artistic decor, designed to add a
    touch of elegance and warmth to your space.</p>
  <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
    <a href="{{ route('products')}}"
      class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-yellow-700 rounded-lg bg-yellow-50 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
      Explore Handmade Crafts
      <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </a>
  </div>
</div>
</section>


<section class="bg-purple-50 dark:bg-gray-900">
<div class="py-6 px-4 mx-auto max-w-screen-xl sm:py-8 lg:px-6">
  <!-- Centered Title Section -->
  <div class="text-center max-w-screen-md mx-auto mb-6 lg:mb-12">
    <h2 class="mb-4 pt-6 text-4xl tracking-tight font-extrabold text-yellow-600 dark:text-white">Our Craft</h2>
    <p class="text-red-700 sm:text-lg font-medium dark:text-gray-400">
      At Craftopia, we celebrate creativity and sustainability. Explore our handpicked collection of Art &
      Paintings, Home Decor, Accessories, and Eco-friendly Crafts. Each piece is crafted with love and
      care, bringing uniqueness and beauty to your home.
    </p>
  </div>

  <!-- Categories Section -->
  <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">

    <!-- Art & Paintings -->
    <div class="text-center">
      <div class="flex justify-center items-center mb-4 w-12 h-12 rounded-full bg-red-100 dark:bg-red-900">
        <!-- Paint Brush Icon -->
        <svg class="w-8 h-8 text-red-500 dark:text-red-300" fill="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M12 0L8 4h8l-4-4zm3 6H9l-6 6v2l2 2v5l2 2h6l2-2v-5l2-2v-2l-6-6z" />
        </svg>
      </div>
      <h3 class="mb-2 text-yellow-600 text-xl font-bold dark:text-white">Art & Paintings</h3>
      <p class="text-red-700 font-semibold dark:text-gray-400">
        Discover unique hand-painted art pieces that add color and personality to any space. Each
        painting tells its own story.
      </p>
    </div>

    <!-- Home Decor -->
    <div class="text-center">
      <div class="flex justify-center items-center mb-4 w-12 h-12 rounded-full bg-gray-200 dark:bg-green-900">
        <!-- Home Decor Icon -->
        <svg class="w-8 h-8 text-gray-700 dark:text-green-300" fill="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z" />
        </svg>
      </div>
      <h3 class="mb-2 text-yellow-600 text-xl font-bold dark:text-white">Home Decor</h3>
      <p class="text-red-700  font-semibold dark:text-gray-400">
        Add warmth and charm to your home with our handcrafted decor items, designed to create a cozy
        and inviting atmosphere.
      </p>
    </div>

    <!-- Eco-Friendly Crafts -->
    <div class="text-center">
      <div class="flex justify-center items-center  mb-4 w-12 h-12 rounded-full bg-green-200 dark:bg-yellow-900">
        <!-- Eco-Friendly Icon -->
        <svg class="w-8 h-8 text-green-700 dark:text-green-300" fill="currentColor" viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path fill-rule="evenodd"
            d="M10 2C6 2 2 5 2 10c0 5 4 8 8 8 4 0 6-2 6-6s-2-6-6-6H8a6 6 0 0110 4c0 6-6 8-8 8-2 0-6-3-6-6s2-6 6-6z"
            clip-rule="evenodd" />
        </svg>
      </div>
      <h3 class="mb-2 text-yellow-600 text-xl font-bold dark:text-white">Eco-Friendly Crafts</h3>
      <p class="text-red-700 font-semibold dark:text-gray-400">
        Sustainable and recycled crafts that enhance your space while caring for the planet. Beautiful
        and eco-conscious!
      </p>
    </div>
  </div>
</div>

<!-- Button Section -->
<div class="flex flex-col pb-10  space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
  <a href="{{route('about')}}"
    class="inline-flex justify-center items-center py-2.5 px-4 text-base font-medium text-white rounded-lg bg-red-900 hover:bg-gray-700 focus:ring-4 focus:ring-yellow-600 dark:focus:ring-primary-900">
    View More
    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
      aria-hidden="true">
      <path fill-rule="evenodd"
        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
        clip-rule="evenodd"></path>
    </svg>
  </a>
</div>
</section>


<section class="bg-yellow-50 py-5 antialiased dark:bg-gray-900 md:py-10">
<div class="mx-auto max-w-screen-xl px-4 pb-4 2xl:px-0">
  <div class="mb-4  flex items-center justify-between gap-4 md:mb-8">
    <div>
      <h2 class="text-xl font-bold text-red-700 dark:text-white sm:text-2xl">Shop by category</h2>
      <p class="text-lg text-red-700 mt-1 px-2 ">200+ unique products</p>
    </div>
    <a href="{{route('products')}}" title=""
      class="flex items-center text-base font-bold text-red-700 text- underline hover:underline dark:text-primary-500">
      See more categories
      <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M19 12H5m14 0-4 4m4-4-4-4" />
      </svg>
    </a>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6  px-4">
    @foreach (range(1, 1) as $item )
    <x-product.card1 />
    @endforeach
  </div>
</div>
</section>


<section class="py-4 bg-blue-100 dark:bg-gray-900">
  <div class="container mx-auto text-center">
      <h1 class="text-3xl font-extrabold tracking-tight text-indigo-900 dark:text-white flex items-center justify-center space-x-2">
          <span>New Year, New Crafts –</span>
          <a href="{{ route ('products') }}" class="underline text-blue-600 hover:no-underline dark:text-blue-400">Shop Now!</a> 🎉
      </h1>
  </div>
</section>

@php
    $carouselImages = [
        'images/r3.jpg',
        'images/r2.jpg',
        'images/r1.jpg',
        
    ];

@endphp

<x-carousel :images="$carouselImages" />



<section class="bg-green-50 py-8 antialiased dark:bg-gray-900 md:py-12">
  <div class="mx-auto max-w-screen ">
    
<!-- Heading & Filters -->
<div class="mb-10 text-center">
  <h2 class="text-3xl font-extrabold text-green-800 dark:text-white mt-4 mb-6">Craftopia Collection</h2>

<!-- Full-width Filter Section -->
<div class=" w-full border border-purple-900 bg-gray-500 py-3  shadow-sm">
  <div class="flex justify-center">
    <nav class="flex flex-col sm:flex-row sm:space-x-24 items-center justify-center" aria-label="Filter Navigation">
      <button class="filter-btn text-lg font-extrabold text-white underline underline-offset-4 decoration-2 decoration-white-700" data-type="Best Sellers">
        Best Sellers
      </button>
      <button class="filter-btn text-lg font-extrabold text-white underline underline-offset-4 decoration-2 decoration-white mt-2 sm:mt-0" data-type="New Arrivals">
        New Arrivals
      </button>
      <button class="filter-btn text-lg font-extrabold text-white underline underline-offset-4 decoration-2 decoration-white mt-2 sm:mt-0" data-type="Hot Sales">
        Hot Sales
      </button>
    </nav>
  </div>
</div>
</div>


    <!-- Dynamic Product Section -->

    <div id="product-section" class="space-y-12 px-12">
      <!-- Default view -->
      <div>
        <h3 class="text-2xl font-bold text-green-800 dark:text-white mb-4">Best Sellers</h3>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
          @foreach ($bestSellers as $product)
            @include('partials.product-card', ['product' => $product])
          @endforeach
        </div>
      </div>

      <div>
        <h3 class="text-2xl font-bold text-green-800 dark:text-white mb-4">New Arrivals</h3>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
          @foreach ($newArrivals as $product)
            @include('partials.product-card', ['product' => $product])
          @endforeach
        </div>
      </div>

      <div>
        <h3 class="text-2xl font-bold text-green-800 dark:text-white mb-4">Hot Sales</h3>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
          @foreach ($hotSales as $product)
            @include('partials.product-card', ['product' => $product])
          @endforeach
        </div>
      </div>
    </div>

    <!-- Show more button -->
    <div class="w-full text-center pt-10">
      <a href="#" class="rounded-lg border border-gray-200 bg-green-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-gray-400 hover:text-white dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Show more</a>
    </div>

  </div>
</section>

<!-- AJAX Script -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const filterButtons = document.querySelectorAll('.filter-btn');

    filterButtons.forEach(button => {
      button.addEventListener('click', function () {
        const type = this.getAttribute('data-type');

        fetch(`/filter-products/${encodeURIComponent(type)}`)
          .then(response => response.text())
          .then(html => {
            document.getElementById('product-section').innerHTML = html;
          })
          .catch(error => {
            console.error('Error loading products:', error);
          });
      });
    });
  });
</script>




  <section class="bg-red-50 dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-pink-800 dark:text-white">Our Blog</h2>
            <p class="font-semibold text-pink-700 sm:text-xl dark:text-gray-400">
              A place where creativity meets passion. Discover crafting techniques, business tips, and inspiring stories from artisans worldwide.
          </p>
        </div> 
        <div class="grid gap-8 lg:grid-cols-2">
            <article class="p-6 bg-purple-50 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-5 font-medium text-pink-900">
                    <span class="bg-purple-100 text-pink-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                        <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                        Crafting Guide
                    </span>
                    <span class="text-sm">14 days ago</span>
                </div>
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-pink-900 dark:text-white"><a href="#">5 Easy Handmade Crafts to Start Today</a></h2>
                <p class="mb-5 font-medium text-pink-800 dark:text-gray-400">Looking for fun DIY projects? Here are five simple yet beautiful crafts that you can start creating today, whether for fun or profit!</p>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar" />
                        <span class="font-medium  dark:text-white">
                            Jese Leos
                        </span>
                    </div>
                    <a href="#" class="inline-flex items-center font-medium text-pink-800 dark:text-primary-500 hover:underline">
                        Read more
                        <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </article> 
            <article class="p-6 bg-purple-50 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-5 text-gray-500">
                    <span class="bg-purple-100 text-pink-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                        <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path><path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                        Business Tips
                    </span>
                    <span class="text-sm text-pink-900 font-medium">10 days ago</span>
                </div>
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-pink-900 dark:text-white"><a href="#">Selling Handmade Crafts: Where to Begin?</a></h2>
                <p class="mb-5 font-medium text-pink-800 dark:text-gray-400">Thinking of turning your craft into a business? Learn the best platforms to sell your handmade items and how to attract your first customers.</p>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png" alt="Bonnie Green avatar" />
                        <span class="font-medium dark:text-white">
                            Bonnie Green
                        </span>
                    </div>
                    <a href="#" class="inline-flex items-center font-medium text-pink-800 dark:text-primary-500 hover:underline">
                        Read more
                        <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </article>                  
        </div>  
    </div>

    <!-- Button Section -->
<div class="flex flex-col pb-8  space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
  <a href="{{route('blog')}}"
    class="inline-flex justify-center items-center py-2.5 px-4 text-base font-medium text-white rounded-lg bg-pink-900 hover:bg-gray-700 focus:ring-4 focus:ring-yellow-600 dark:focus:ring-primary-900">
    View More
    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
      aria-hidden="true">
      <path fill-rule="evenodd"
        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
        clip-rule="evenodd"></path>
    </svg>
  </a>
</div>
  </section>

@endsection

