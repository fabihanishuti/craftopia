@extends('layouts.app')

@section('body_content')

<!-- Breadcrumb -->
<section class="bg-gray-200 py-6">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl text-red-700 font-extrabold mb-2">About Us</h2>
        <nav class="text-sm font-bold text-red-900">
            <a href="/" class="hover:underline">Home</a> / <span>About Us</span>
        </nav>
    </div>
</section>

<!-- About Image -->
<section class="py-10  bg-purple-50">
  <div class="container mx-auto px-4 ">
    <div class="w-full h-[500px] overflow-hidden rounded-xl shadow-lg">
        <img src="{{ asset('images/about1.jpg') }}" 
             alt="About Us" 
             class="w-full h-full object-cover object-center">
    </div>
</div>

</section>

<!-- Who We Are -->
<section class="py-12 bg-yellow-50">
    <div class="container mx-auto px-4 grid md:grid-cols-3 gap-8 text-center">
        <div class="p-6 shadow-lg rounded-lg bg-yellow-200">
            <h3 class="text-xl text-red-700 font-bold mb-3">Who We Are?</h3>
            <p class="font-medium text-yellow-800">We are passionate crafters dedicated to bringing you the best handmade products with care and authenticity.</p>
        </div>
        <div class="p-6 shadow-lg rounded-lg bg-yellow-200">
            <h3 class="text-xl text-red-700 font-bold mb-3">What We Do?</h3>
            <p class="font-medium text-yellow-800">We design and sell hand-crafted items that bring warmth and individuality to your space and lifestyle.</p>
        </div>
        <div class="p-6 shadow-lg rounded-lg bg-yellow-200">
            <h3 class="text-xl text-red-700 font-bold mb-3">Why Choose Us?</h3>
            <p class="font-medium text-yellow-800">Our creations are unique, sustainable, and tailored to perfection—because you deserve more than ordinary.</p>
        </div>
    </div>
</section>

<!-- Testimonial -->
<section class="bg-gray-50 py-12">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
        <div class="md:w-1/2">
            <blockquote class="text-lg italic border-l-4 pl-4 border-indigo-400 mb-4 text-gray-900 font-bold">
                “Craftopia is my go-to for unique handmade gifts. Every item tells a story!”
            </blockquote>
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/about.jpg') }}" alt="Author" class="w-12 h-12 rounded-full">
                <div>
                    <h5 class="font-semibold">Augusta Schultz</h5>
                    <p class="text-sm text-gray-500">Fashion Designer</p>
                </div>
            </div>
        </div>
        <div class="md:w-1/2">
          <img src="{{ asset('images/about.jpg') }}" 
         
          class="w-full h-[400px] object-contain rounded-xl shadow-lg">
        </div>
    </div>
</section>

<!-- Counters -->
<section class="py-12 bg-indigo-50">
    <div class="container mx-auto px-4 grid md:grid-cols-4 gap-6 text-center">
        @foreach ([['102', 'Our Clients'], ['30', 'Categories'], ['102', 'In Country'], ['98%', 'Happy Customers']] as [$num, $label])
            <div class="p-6 bg-purple-50 shadow-lg rounded-lg">
                <h2 class="text-3xl font-bold text-red-900">{{ $num }}</h2>
                <p class="mt-2 text-sm text-red-800">{{ $label }}</p>
            </div>
        @endforeach
    </div>
</section>

<!-- Team -->
<section class="py-12 bg-gray-200">
    <div class="container mx-auto px-4 text-center bg-gray-100">
        <h2 class="text-2xl text-purple-800 font-bold pt-4 mb-10">Meet Our Team</h2>
        <div class="grid md:grid-cols-4 gap-6">
            @foreach ([['c1.jpg', 'Chihiro Ogino', 'Designer'], ['c2.jpg', ' San', 'CEO'], ['c3.jpg', 'Kiki ', 'Manager'], ['c4.jpg', 'Sheeta ', 'Delivery']] as [$img, $name, $role])
                <div class="bg-purple-50 p-4 shadow rounded-lg">
                    <img src="{{ asset("images/$img") }}" class="w-full h-48 object-cover rounded-lg mb-3">
                    <h4 class="font-semibold">{{ $name }}</h4>
                    <p class="text-sm text-gray-500">{{ $role }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
