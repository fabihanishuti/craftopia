@extends('layouts.app')

@section('body_content')

<!-- Breadcrumb Section Begin -->
<section class="bg-gray-100 py-4">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <h4 class="text-lg font-semibold">Check Out</h4>
            <div class="text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-gray-800">Home</a>
                <span> / </span>
                <a href="{{ route('products') }}" class="hover:text-gray-800">Shop</a>
                <span> / Check Out</span>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="py-10 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h6 class="text-lg font-semibold mb-4">Billing Details</h6>
                <form action="#" method="POST" class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium">First Name<span class="text-red-500">*</span></label>
                            <input type="text" class="w-full border rounded-lg p-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Last Name<span class="text-red-500">*</span></label>
                            <input type="text" class="w-full border rounded-lg p-2">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Country<span class="text-red-500">*</span></label>
                        <input type="text" class="w-full border rounded-lg p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Address<span class="text-red-500">*</span></label>
                        <input type="text" class="w-full border rounded-lg p-2" placeholder="Street Address">
                        <input type="text" class="w-full border rounded-lg p-2 mt-2" placeholder="Apartment, suite, unit (optional)">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium">City/Town<span class="text-red-500">*</span></label>
                            <input type="text" class="w-full border rounded-lg p-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">State/Country<span class="text-red-500">*</span></label>
                            <input type="text" class="w-full border rounded-lg p-2">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Postcode / ZIP<span class="text-red-500">*</span></label>
                        <input type="text" class="w-full border rounded-lg p-2">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium">Phone<span class="text-red-500">*</span></label>
                            <input type="text" class="w-full border rounded-lg p-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Email<span class="text-red-500">*</span></label>
                            <input type="text" class="w-full border rounded-lg p-2">
                        </div>
                    </div>
                    <div class="flex flex-col space-y-4">
                        <!-- Create an Account Checkbox -->
                        <div class="flex items-center space-x-2">
                            <input id="acc" type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="acc" class="text-sm font-medium text-gray-700">Create an account?</label>
                        </div>
                        <p class="text-sm text-gray-500">Create an account by entering the information below. If you are a returning customer, please login at the top of the page.</p>
                        
                        <!-- Account Password Input -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Account Password<span class="text-red-500">*</span></label>
                            <input type="password" id="password" class="w-full p-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your password">
                        </div>
                        
                        <!-- Order Notes Checkbox -->
                        <div class="flex items-center space-x-2">
                            <input id="diff-acc" type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="diff-acc" class="text-sm font-medium text-gray-700">Note about your order, e.g., special note for delivery</label>
                        </div>
                        
                        <!-- Order Notes Input -->
                        <div>
                            <label for="order-notes" class="block text-sm font-medium text-gray-700">Order notes</label>
                            <textarea id="order-notes" rows="3" class="w-full p-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Notes about your order, e.g., special notes for delivery."></textarea>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="border p-6 rounded-lg shadow-lg">
                <h4 class="text-lg font-semibold mb-4">Your Order</h4>
                <div class="mb-4 border-b pb-2">
                    <div class="flex justify-between text-sm font-medium">
                        <span>Product</span>
                        <span>Total</span>
                    </div>
                </div>
                <ul class="mb-4 space-y-2">
                    <li class="flex justify-between"><span>Vanilla salted caramel</span><span>$300.00</span></li>
                    <li class="flex justify-between"><span>German chocolate</span><span>$170.00</span></li>
                    <li class="flex justify-between"><span>Sweet autumn</span><span>$170.00</span></li>
                    <li class="flex justify-between"><span>Gluten-free mini dozen</span><span>$110.00</span></li>
                </ul>
                <div class="border-t pt-2 mb-4">
                    <div class="flex justify-between text-sm font-medium">
                        <span>Subtotal</span>
                        <span>$750.99</span>
                    </div>
                    <div class="flex justify-between text-lg font-bold">
                        <span>Total</span>
                        <span>$750.99</span>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" class="rounded border-gray-300">
                        <span>Check Payment</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" class="rounded border-gray-300">
                        <span>Paypal</span>
                    </label>
                </div>
                <button type="submit" class="mt-4 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Place Order</button>
            </div>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

@endsection
