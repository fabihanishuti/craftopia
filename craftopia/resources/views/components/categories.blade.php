{{-- <div class="max-w-7xl mx-auto px-6 lg:px-8 my-10">
    <!-- Title -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Shop by categories</h2>
            <p class="text-sm text-gray-500 mt-1">200+ unique products</p>
        </div>
        <a href="{{ route('categories.index') }}" class="text-gray-600 text-sm font-medium hover:text-gray-900">
            ALL CATEGORIES →
        </a>
    </div>

    <!-- Categories Grid -->
    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($categories as $category)
        <div class="group bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105">
            <a href="{{ route('category.show', $category->slug) }}" class="block">
                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-full h-48 object-cover">
                <div class="p-4 text-center">
                    <h3 class="text-lg font-semibold text-gray-700">{{ $category->name }}</h3>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div> --}}
