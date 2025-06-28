
<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Add New Product</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium">Title</label>
            <input type="text" name="title" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block text-sm font-medium">Description</label>
            <textarea name="description" class="w-full border rounded p-2" required></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Price</label>
            <input type="number" name="price" step="0.01" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block text-sm font-medium">Type</label>
            <select name="type" class="w-full border rounded p-2" required>
                <option value="Best Sellers">Best Sellers</option>
                <option value="New Arrivals">New Arrivals</option>
                <option value="Hot Sales">Hot Sales</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium">Product Image</label>
            <input type="file" name="picture" accept="image/*" class="w-full border rounded p-2" required>
        </div>

        <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
            Add Product
        </button>
    </form>
</div>

