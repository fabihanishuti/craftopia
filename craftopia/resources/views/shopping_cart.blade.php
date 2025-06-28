@extends('layouts.app')

@section('body_content')

<section class="bg-white py-10 antialiased dark:bg-gray-900">
  <div class="max-w-screen-xl mx-auto px-4 md:px-8">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">🛒 Shopping Cart</h2>

    @if (session()->has('success'))
    <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-200 rounded-lg dark:bg-gray-800 dark:text-green-400">
      {{ session('success') }}
    </div>
    @endif

    <div class="flex flex-col lg:flex-row gap-8">

      <!-- Left: Cart Items -->
      <div class="flex-1">
        @if(count($cartItems) > 0)
        <form action="{{ route('cart.updateAll') }}" method="POST">
          @csrf
          <div class="hidden md:grid grid-cols-3 gap-4 p-4 text-sm font-semibold text-gray-600 uppercase bg-gray-100 rounded-md">
            <div>Product</div>
            <div class="text-center">Quantity & Total</div>
            <div class="text-center">Action</div>
          </div>

          @foreach ($cartItems as $index => $item)
          <div class="mt-4 bg-white border rounded-lg shadow-sm p-4 md:p-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
              <div class="flex items-center gap-4">
                <img src="{{ asset('uploads/products/' . $item->picture) }}"
                  onerror="this.onerror=null; this.src='{{ asset('images/default.jpg') }}';"
                  alt="{{ $item->title }}"
                  class="w-24 h-24 object-contain rounded-md">
                <div>
                  <h3 class="font-semibold text-gray-800">{{ $item->title }}</h3>
                  <p class="text-sm text-gray-500">Unit Price: $<span class="unit-price">{{ $item->price }}</span></p>
                </div>
              </div>

              <div class="flex items-center gap-4 justify-center">
                <input type="hidden" name="cartIds[]" value="{{ $item->cartId }}">
                <input type="number" name="quantities[]" min="1" max="{{ $item->pQuantity }}"
                  value="{{ $item->quantity }}"
                  class="quantity-input w-20 p-2 border rounded text-center">
                <div class="font-medium text-gray-800">
                  $<span class="subtotal">{{ $item->price * $item->quantity }}</span>
                </div>
              </div>

              <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <button type="button"
                  class="text-sm text-gray-500 hover:text-indigo-600 flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M12 6C6.5 1 1 8 6 13l6 7 6-7c5-5-1.5-12-6-7z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                  </svg>
                  Add to Favorites
                </button>

                <a href="{{ route('deleteCartItem', ['id' => $item->cartId]) }}"
                  class="text-sm text-red-600 hover:underline flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                  </svg>
                  Remove
                </a>
              </div>
            </div>
          </div>
          @endforeach

          <div class="flex flex-col md:flex-row justify-between items-center mt-6 gap-4">
            <a href="{{ route('home') }}" class="text-sm text-gray-700 hover:underline">
              ← Continue Shopping
            </a>
            <div class="text-lg font-bold text-gray-900">
              Total: $<span id="grand-total">0</span>
            </div>
          </div>

          <div class="mt-4 text-right">
            <button type="submit"
              class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow">
              Update Cart
            </button>
          </div>
        </form>
        @else
        <p class="text-gray-500">Your cart is empty.</p>
        @endif
      </div>

      <!-- Right: Summary and Checkout -->
      <div class="w-full lg:w-1/3 space-y-6">
        <!-- Order Summary -->
        <div class="bg-gray-50 p-6 border rounded-lg shadow-sm">
          <h3 class="text-lg font-semibold mb-4">Order Summary</h3>
          <div class="space-y-2 text-sm">
            <div class="flex justify-between">
              <span>Subtotal</span>
              <span class="font-medium text-gray-700">$<span id="summary-subtotal">0.00</span></span>
            </div>
            <div class="flex justify-between font-semibold border-t pt-2">
              <span>Total</span>
              <span class="text-red-600">$<span id="summary-total">0.00</span></span>
            </div>
          </div>
        </div>

        <!-- Checkout Form -->
        <div class="bg-white p-6 border rounded-lg shadow-sm">
          <form action="{{ route('stripe') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="fullname" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="fullname" id="fullname" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="tel" name="phone" id="phone" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" id="address" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>

            <div>
                <label for="bill" class="block text-sm font-medium text-gray-700">Bill Amount</label>
                <input type="text" name="bill" id="bill" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ session('checkout_bill') }}" readonly>
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-black text-white rounded hover:bg-gray-800 transition">
                Proceed to Checkout
            </button>
        </form>
        
        </div>

        <!-- Discount Code -->
        <div class="bg-white p-6 border rounded-lg shadow-sm">
          <form class="space-y-3">
            <label for="voucher" class="block text-sm font-medium text-gray-700">Discount Code</label>
            <input type="text" id="voucher" class="w-full p-2 border border-gray-300 rounded" placeholder="Coupon code">
            <button type="submit"
              class="w-full py-2 bg-black text-white rounded hover:bg-gray-800">Apply</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function updateTotals() {
    let total = 0;
    document.querySelectorAll('.quantity-input').forEach((input, index) => {
      const quantity = parseInt(input.value);
      const price = parseFloat(document.querySelectorAll('.unit-price')[index].innerText);
      const subtotal = quantity * price;
      document.querySelectorAll('.subtotal')[index].innerText = subtotal.toFixed(2);
      total += subtotal;
    });

    document.getElementById('grand-total').innerText = total.toFixed(2);
    document.getElementById('summary-subtotal').innerText = total.toFixed(2);
    document.getElementById('summary-total').innerText = total.toFixed(2);

    const hiddenBillInput = document.querySelector('input[name="bill"]');
    if (hiddenBillInput) {
      hiddenBillInput.value = total.toFixed(2);
    }
  }

  window.addEventListener('DOMContentLoaded', updateTotals);
  document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('input', updateTotals);
  });
</script>

@endsection
