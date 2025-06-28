@extends('layouts.app')

@section('body_content')
<!-- Contact Section -->
<section class="bg-purple-100 py-16">
    <div class="max-w-3xl mx-auto px-6">
        <h2 class="text-4xl font-extrabold text-center text-purple-800 mb-4">Get in Touch</h2>
        <p class="text-center text-blue-900 font-bold text-lg mb-10">
            Got a question about your order or want to collaborate with Craftopia? Let us know!
        </p>

        <form method="POST" action="#" class="space-y-6 bg-purple-900 p-8 rounded-xl shadow-md">
            @csrf
            <!-- Email -->
            <div>
                <label for="email" class="block mb-2 text-sm font-semibold text-white">Your Email</label>
                <input type="email" id="email" name="email" required placeholder="you@example.com"
                    class="w-full rounded-lg border border-gray-300 bg-white p-3 text-sm shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>

            <!-- Subject -->
            <div>
                <label for="subject" class="block mb-2 text-sm font-semibold text-white">Subject</label>
                <input type="text" id="subject" name="subject" required placeholder="Subject of your message"
                    class="w-full rounded-lg border border-gray-300 bg-white p-3 text-sm shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>

            <!-- Message -->
            <div>
                <label for="message" class="block mb-2 text-sm font-semibold text-white">Message</label>
                <textarea id="message" name="message" rows="5" required placeholder="Write your message..."
                    class="w-full rounded-lg border border-gray-300 bg-white p-3 text-sm shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                    class="bg-white text-purple-900  hover:bg-gray-300 text-purple-900 font-semibold py-3 px-6 rounded-lg transition duration-300 shadow-md">
                    Send Message
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
