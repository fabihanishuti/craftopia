<div>
  <h3 class="text-xl font-bold text-green-800 dark:text-white mb-4">{{ $type }}</h3>
  @if ($products->isEmpty())
    <p class="text-gray-600 dark:text-gray-400">No products found in this category.</p>
  @else
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
      @foreach ($products as $product)
        @include('partials.product-card', ['product' => $product])
      @endforeach
    </div>
  @endif
</div>
