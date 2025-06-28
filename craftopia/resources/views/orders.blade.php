@extends('layouts.app')

@section('body_content')
<section class="bg-white  dark:bg-gray-900">
    <div class="max-w-screen min-h-screen  mx-auto px-4 mt-10">
        <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white   border-b pb-4">
            My Order History
        </h2>

        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full max-w-6xl mx-auto text-sm text-center text-gray-700 dark:text-gray-300">
                <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-200">
                    <tr>
                        <th class="px-6 py-4">#</th>
                        <th class="px-6 py-4">Total Bill</th>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Address</th>
                        <th class="px-6 py-4">Phone</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Order Date</th>
                        <th class="px-6 py-4">View Products</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $index => $order)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">${{ number_format($order->bill, 2) }}</td>
                        <td class="px-6 py-4">{{ $order->fullname }}</td>
                        <td class="px-6 py-4">{{ $order->address }}</td>
                        <td class="px-6 py-4">{{ $order->phone }}</td>
                        <td class="px-6 py-4">
                            @if($order->status == 'Paid')
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">Paid</span>
                            @elseif($order->status == 'Pending')
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded">Pending</span>
                            @else
                                <span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2 py-1 rounded">{{ $order->status }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d H:i:s') }}</td>
                        <td class="px-6 py-4">
                            <!-- View Products Button -->
                            <button data-modal-toggle="order-{{ $order->id }}" 
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-5 py-2.5 rounded-lg transition duration-200">
                                View Products
                            </button>

                            <!-- Modal -->
                            <div id="order-{{ $order->id }}" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex items-center justify-center">
                                <div class="relative w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                                        <!-- Modal header -->
                                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-700">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                All Products
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                                                data-modal-hide="order-{{ $order->id }}">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="p-6 space-y-4">
                                            <div class="overflow-x-auto">
                                                <table class="w-full max-w-4xl mx-auto text-sm text-center text-gray-700 dark:text-gray-300">
                                                    <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-200">
                                                        <tr>
                                                            <th class="px-4 py-2 text-left">Product</th>
                                                            <th class="px-4 py-2 text-center">Quantity</th>
                                                            <th class="px-4 py-2 text-center">Price</th>
                                                            <th class="px-4 py-2 text-center">Sub Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($order->items as $item)
                                                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                                            <td class="flex items-center px-4 py-3 space-x-4 text-left">
                                                                <img src="{{ asset('uploads/products/' . $item->picture) }}" alt="{{ $item->title }}"
                                                                    class="w-16 h-16 object-cover rounded">
                                                                <span>{{ $item->title }}</span>
                                                            </td>
                                                            <td class="px-4 py-3 text-center">{{ $item->quantity }}</td>
                                                            <td class="px-4 py-3 text-center">${{ number_format($item->price, 2) }}</td>
                                                            <td class="px-4 py-3 text-center">${{ number_format($item->quantity * $item->price, 2) }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="flex justify-end items-center p-4 border-t border-gray-200 rounded-b dark:border-gray-700">
                                            <button data-modal-hide="order-{{ $order->id }}" type="button"
                                                class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                            No orders found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Modal Toggle Script -->
<script>
    document.querySelectorAll('[data-modal-toggle]').forEach(button => {
        button.addEventListener('click', function () {
            const modalId = this.getAttribute('data-modal-toggle');
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        });
    });
</script>
@endsection
