
@extends('layouts.app')

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ env("STRIPE_KEY") }}');
    const elements = stripe.elements();
    const card = elements.create("card", {
        style: {
            base: {
                color: "#32325d",
                fontSize: "16px",
                "::placeholder": {
                    color: "#aab7c4"
                }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        }
    });

    card.mount("#card-element");

    const form = document.getElementById("payment-form");
    form.addEventListener("submit", function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                document.getElementById("card-errors").textContent = result.error.message;
            } else {
                const hiddenInput = document.createElement("input");
                hiddenInput.setAttribute("type", "hidden");
                hiddenInput.setAttribute("name", "stripeToken");
                hiddenInput.setAttribute("value", result.token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        });
    });
</script>
@endpush

@section('body_content')
<div class="min-h-screen">
<div class="max-w-lg  mx-auto p-6 bg-white rounded-lg shadow-lg mt-20">
    <h2 class="text-2xl font-semibold text-center mb-10 ">Secure Stripe Payment</h2>

    @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 p-4 rounded-lg shadow-md">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="mb-4 text-red-700 bg-red-100 p-4 rounded-lg shadow-md">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('stripe.post') }}" method="POST" id="payment-form">
        @csrf

        <!-- Stripe Card Element -->
        <div class="mb-4">
            <label for="card-element" class="block text-sm font-medium text-gray-700 mb-2">Credit or Debit Card</label>
            <div id="card-element" class="p-4 border-2 border-gray-300 rounded-lg"></div>
            <div id="card-errors" class="text-red-600 mt-2 text-sm" role="alert"></div>
        </div>

        <!-- Payment Button -->
        <div class="flex justify-between items-center mb-10">
            <span class="text-lg font-semibold text-gray-900">Total: ${{ session('checkout_bill') }}</span>
            <button class="w-40 py-2 px-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Pay Now
            </button>
        </div>
    </form>
</div>
</div>

@endsection
