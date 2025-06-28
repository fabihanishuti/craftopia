@extends('layouts.app')

@section('body_content')

<section class=" max-w-screen w-full h-full bg-purple-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center pt-7 pb-8">
        <a href="#" class="flex items-center mb-6  text-2xl font-extrabold text-purple-800 dark:text-white">
            Sign Up
        </a>
        <div class="w-full bg-purple-200 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-purple-900 md:text-2xl dark:text-white">
                    Create an account
                </h1>
                <!-- Laravel form with CSRF token and multipart for file upload -->
                <form method="POST" action="{{ route('signupUser') }}" class="space-y-4 md:space-y-6" enctype="multipart/form-data">
                    @csrf <!-- CSRF Token for Laravel -->
                    
                    <div>
                        <label for="fullname" class="block mb-2 text-sm font-medium text-purple-900 dark:text-white">Full Name</label>
                        <input type="text" name="fullname" id="fullname" value="{{ old('fullname') }}" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                               placeholder="name" required>
                        @error('fullname')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-purple-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                               placeholder="name@gmail.com" required>
                        @error('email')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-purple-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                               placeholder="••••••••" required>
                        @error('password')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-purple-900 dark:text-white">Confirm password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                               placeholder="••••••••" required>
                    </div>

                    <div>
                        <label for="file" class="block mb-2 text-sm font-medium text-purple-900 dark:text-white">Upload Profile Picture</label>
                        <input type="file" name="file" id="file" accept="image/*"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('file')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    

                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" aria-describedby="terms" type="checkbox" name="terms" 
                                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-medium text-purple-500 dark:text-gray-300">I accept the 
                                <a class="font-medium text-purple-600 hover:underline dark:text-primary-500" href="#">Terms and Conditions</a>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="w-full text-white bg-purple-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Create an account
                    </button>

                    <p class="text-sm font-medium text-purple-500 dark:text-gray-400">
                        Already have an account? 
                        <a href="{{ route('signin') }}" class="font-medium text-purple-600 hover:underline dark:text-primary-500">SignIn here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
