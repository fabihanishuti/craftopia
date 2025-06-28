@extends('layouts.app')


@push('scripts')
<script>
  let currentImage = 0;

  const imageDetails = [
    {
      title: "Handmade Crochet Sofa Covers",
      price: "$1,249.99",
      rating: 5.0,
      reviews: 345,
      description: "Studio quality three mic array for crystal clear calls and voice recordings. Six-speaker sound system for a remarkably robust and high-quality audio experience. Up to 256GB of ultrafast SSD storage."
    },
    {
      title: "Handmade Wool Sofa Covers",
      price: "$1,099.99",
      rating: 4.8,
      reviews: 300,
      description: "Premium wool fabric with superior warmth and comfort. Ideal for cold weather. Durable and long-lasting design."
    },
    {
      title: "Luxury Velvet Sofa Covers",
      price: "$1,499.99",
      rating: 4.9,
      reviews: 500,
      description: "Soft velvet finish with a rich look. Perfect for luxurious interiors. Provides excellent comfort and style."
    }
  ];

  const viewImage = (e, index) => {
      currentImage = index;
      let imgSrc = e.querySelector('img').src;
      document.getElementById('bigImage').src = imgSrc;
      updateDetails(currentImage);
  }
  
  const nextPrevious = (index) => {
      let i = currentImage + index;
      let images = document.getElementById('images').querySelectorAll('img');
  
      if (i >= images.length || i < 0) return;
  
      currentImage = i;
      let arr = Array.from(images).map(element => element.src);
      document.getElementById('bigImage').src = arr[currentImage];
      updateDetails(currentImage);
  }

  const updateDetails = (index) => {
      const details = imageDetails[index];
      document.getElementById('productTitle').innerText = details.title;
      document.getElementById('productPrice').innerText = details.price;
      document.getElementById('productRating').innerText = details.rating;
      document.getElementById('productReviews').innerText = details.reviews;
      document.getElementById('productDescription').innerText = details.description;
  }
  
  // Initialize with first product details
  document.addEventListener('DOMContentLoaded', () => {
    updateDetails(currentImage);
  });
</script>
@endpush


@section('body_content')
<div class="max-w-screen mx-auto w-full h-full bg-purple-50 rounded-lg shadow-md">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6 ">
   
    <div class="flex gap-4 mx-6">
      <!-- Thumbnail Image List with Scroll (Matches Main Image Height) -->
      <div  id="images" class="flex flex-col gap-3 h-96 overflow-y-auto">
        @foreach (range(1, 4) as $item)
        <div onclick="viewImage(this, '{{$loop->index}}')" class="bg-white rounded-md shadow p-3 cursor-pointer  flex items-center justify-center">
          <img class="w-40 h-40 object-cover" src="{{asset('images/product-' . $loop->iteration . '.jpg')}}" alt="" />
        </div>
        @endforeach
      </div>
      
      <!-- Main Image Container -->
      <div class="h-96 relative bg-white rounded-md shadow-md p-3 flex items-center justify-center">
        <img id="bigImage" class="h-full object-cover" src="{{asset('images/product-4.jpg')}}" alt="Product Image">
    
        <!-- Left Navigation Button -->
        <span onclick="nextPrevious(-1)" class="absolute top-1/2 left-1 transform -translate-y-1/2 bg-white rounded-full w-12 h-12 shadow flex items-center justify-center cursor-pointer">
          <i class='bx bx-chevron-left text-xl'></i>
        </span>
    
        <!-- Right Navigation Button -->
        <span onclick="nextPrevious(1)" class="absolute top-1/2 right-1 transform -translate-y-1/2 bg-white rounded-full w-12 h-12 shadow flex items-center justify-center cursor-pointer">
          <i class='bx bx-chevron-right text-xl'></i>
        </span>
      </div>
    </div>

    <!-- Product Details Section -->
    <div>
      <h2 id="productTitle" class="text-2xl font-semibold">Handmade Crochet Sofa Covers</h2>
      <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
        <p id="productPrice" class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
          $1,249.99
        </p>
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
        <!-- Add to Favorites -->
        <a href="#" title="" class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
          <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
          </svg>
          Add to favorites
        </a>

        <!-- Add to Cart -->
        <a href="{{ route('shopping_cart') }}" title="" class="text-white mt-4 sm:mt-0 bg-red-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center">
          <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
          </svg>
          Add to cart
        </a>

        {{-- <!-- Buy Now -->
        <a href="#" title="" class="text-white mt-4 sm:mt-0 bg-purple-800 hover:bg-purple-900 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800 flex items-center justify-center">
          <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v12m0 0l4-4m-4 4l-4-4m-6 9h20" />
          </svg>
          Buy Now
        </a> --}}
      </div>

      <div class="mt-6">
        <p id="productDescription" class="mb-6 text-gray-500 dark:text-gray-400">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa ullam ratione error sequi sapiente repudiandae mollitia ex velit reiciendis magnam fuga libero ad veniam cum cupiditate similique obcaecati ut facilis, corporis dolores impedit laudantium officiis illum. Dolor.
        </p>
      </div>
    </div>
  </div>
</div>


</div>

  <div class="mt-6 mx-7">
      <h3 class="text-2xl font-extrabold">Product Description</h3>
      <p class="text-gray-600 text-lg mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa ullam ratione error sequi sapiente repudiandae mollitia ex velit reiciendis magnam fuga libero ad veniam cum cupiditate similique obcaecati ut facilis, corporis dolores impedit laudantium officiis illum. Dolor, odio facere ratione quidem ut eaque vero exercitationem esse aperiam odit, ipsam nobis? In ea corporis ratione explicabo, facilis deserunt. Exercitationem, earum vel! Pariatur adipisci voluptatem iure doloribus commodi accusamus dolorum quis, saepe libero cum consequuntur quidem modi architecto possimus consectetur voluptatibus illum? Fuga facilis est, animi debitis consequuntur voluptas repellendus eligendi dolorem culpa architecto nostrum repudiandae, eum error ad aliquid, nesciunt obcaecati.
      </p>
  </div>
  <div class="mt-10 mx-6">
    <h3 class="text-lg font-semibold">Featured Products</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
        <div class="bg-white shadow rounded-lg p-2">
            <img src="/images/product-1.jpg" class="w-full rounded">
            <p class="mt-2 text-sm font-semibold">Crochet Cushion Cover</p>
            <p class="text-red-500 font-bold">₹550</p>
        </div>
        <div class="bg-white shadow rounded-lg p-2">
            <img src="/images/product-2.jpg" class="w-full rounded">
            <p class="mt-2 text-sm font-semibold">Woolen Table Runner</p>
            <p class="text-red-500 font-bold">₹600</p>
        </div>
        <div class="bg-white shadow rounded-lg p-2">
            <img src="/images/product-3.jpg" class="w-full rounded">
            <p class="mt-2 text-sm font-semibold">Velvet Throw Blanket</p>
            <p class="text-red-500 font-bold">₹450</p>
        </div>
        <div class="bg-white shadow rounded-lg p-2">
            <img src="/images/product-4.jpg" class="w-full rounded">
            <p class="mt-2 text-sm font-semibold">Handcrafted Sofa Mat</p>
            <p class="text-red-500 font-bold">₹500</p>
        </div>
    </div>
</div>

</div>
</div>
</div>
  @endsection