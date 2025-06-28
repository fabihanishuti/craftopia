{{-- Example inside x-product.artsection --}}
@props(['product'])

<div class="bg-white p-4 shadow rounded-lg">
  <img src="{{ asset('uploads/products/' . $product->picture) }}" alt="{{ $product->title }}" class="w-full h-40 object-cover mb-2">
  <h2 class="text-lg font-semibold">{{ $product->title }}</h2>
  <p class="text-sm text-gray-700">৳{{ $product->price }}</p>
  <p class="text-xs text-gray-500">{{ $product->description }}</p>
</div>
