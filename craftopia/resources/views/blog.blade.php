@extends('layouts.app')

@section('body_content')

<!-- Blog Hero Section -->
<section class="bg-orange-50 py-16">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 leading-tight mb-4">
            Discover the Art Behind Every Handmade Creation at Craftopia
        </h2>
        <ul class="flex flex-wrap justify-center space-x-6 text-gray-500 text-sm font-medium">
            <li>By <span class="text-gray-700 font-semibold">Craftopia Team</span></li>
            <li>April 11, 2025</li>
            <li>5 Comments</li>
        </ul>
    </div>
</section>

<!-- Blog Content Section -->
<section class="py-14 bg-purple-50">
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-12 gap-8">
      <div class="md:col-span-12">
        <div class="overflow-hidden rounded-2xl shadow-md mb-10">
            <img src="{{ asset('images/blog1.jpg') }}" alt="Craft Banner"
                 class="w-full h-[400px] object-cover transition-transform duration-500 hover:scale-105">
        </div>
    </div>

        <div class="md:col-span-12 md:col-center bg-yellow-50 px-6 py-6 ">
            <div class="flex justify-between items-center mb-6 border-b pb-3">
                <span class="text-sm uppercase tracking-wide text-gray-500">Share</span>
                <div class="flex space-x-3 text-gray-600">
                    <a href="#" class="hover:text-blue-600"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="hover:text-sky-500"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="hover:text-red-500"><i class="fa fa-youtube-play"></i></a>
                    <a href="#" class="hover:text-blue-800"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>

            <div class="prose max-w-none prose-orange prose-lg text-gray-700">
                <p>At Craftopia, every brush stroke, every knot, and every petal is made with love. We believe in empowering artists by giving their handmade creations a platform to shine.</p>
                <p>Our mission is to celebrate the passion behind handcrafted items—whether it's a watercolor painting, a rustic flower holder, or a minimalist sketch on canvas.</p>

                <p>Each item tells a story—crafted not in factories, but in cozy home studios, sunny balconies, and midnight creative bursts. Our artists pour their hearts into every piece.</p>

                <blockquote class="bg-orange-100 border-l-4 border-orange-500 italic p-5 rounded-xl my-6 shadow-sm">
                    <p>"When you buy from a maker, you’re buying more than just a product—you’re buying a piece of their soul, a moment of their life, a piece of their story."</p>
                    <footer class="mt-3 text-sm font-medium text-orange-600">— Craftopia Artist Spotlight</footer>
                </blockquote>

                <p>From vibrant boho wall art to delicate floral arrangements, Craftopia connects you to meaningful decor made with care. It's not just shopping—it’s supporting dreams.</p>
                <p>Join our growing community of craft lovers, artists, and conscious shoppers who choose uniqueness, sustainability, and love in every purchase.</p>
            </div>

            <!-- Author & Tags -->
            <div class="mt-12 flex justify-between items-center flex-wrap gap-6 border-t pt-6">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('images/c1.jpg') }}" alt="Author"
                         class="w-12 h-12 rounded-full object-cover shadow">
                    <div>
                        <h5 class="font-semibold text-gray-700">Kiki </h5>
                        <span class="text-sm text-gray-500">Founder, Craftopia</span>
                    </div>
                </div>
                <div class="flex gap-2">
                    <span class="px-3 py-1 bg-orange-100 text-orange-700 text-sm rounded-full">#Handmade</span>
                    <span class="px-3 py-1 bg-orange-100 text-orange-700 text-sm rounded-full">#ArtisanCrafts</span>
                    <span class="px-3 py-1 bg-orange-100 text-orange-700 text-sm rounded-full">#SupportLocal</span>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <a href="#" class="bg-gray-100 hover:bg-gray-200 p-5 rounded-xl transition shadow-sm">
                    <p class="text-sm text-gray-500 mb-1 flex items-center"><i class="fa fa-arrow-left mr-2"></i> Previous Post</p>
                    <h5 class="font-semibold text-gray-700">How to Style Your Home with Handmade Decor</h5>
                </a>
                <a href="#" class="bg-gray-100 hover:bg-gray-200 p-5 rounded-xl transition shadow-sm text-right">
                    <p class="text-sm text-gray-500 mb-1 flex items-center justify-end">Next Post <i class="fa fa-arrow-right ml-2"></i></p>
                    <h5 class="font-semibold text-gray-700">Meet the Artist: Behind the Scenes with Aroona Designs</h5>
                </a>
            </div>

            <!-- Comment Form -->
            <div class="mt-14">
                <h4 class="text-2xl font-semibold text-gray-800 mb-6">Leave A Comment</h4>
                <form action="#" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <input type="text" placeholder="Name"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <input type="email" placeholder="Email"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <input type="text" placeholder="Phone"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-400">
                    </div>
                    <textarea rows="5" placeholder="Comment"
                              class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-400"></textarea>
                    <button type="submit"
                            class="bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition">
                        Post Comment
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
