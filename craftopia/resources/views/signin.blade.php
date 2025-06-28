@extends('layouts.app')

@section('body_content')

<section class="bg-pink-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      
      <a href="#" class="flex items-center mb-6 text-2xl font-extrabold text-red-900 dark:text-white">
          Sign In    
      </a>

      <div class="w-full bg-red-200 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        
        {{-- Success Message --}}
        @if (session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ session()->get('success') }}
        </div>
        @endif

          {{-- Error Message --}}
          @if (session('error'))
          <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
              {{ session('error') }}
          </div>
      @endif
      

        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

            <h1 class="text-xl font-bold leading-tight tracking-tight text-red-900 md:text-2xl dark:text-white">
                Sign in to your account
            </h1>

            <form method="POST" action="{{ route('signinUser') }}" class="space-y-4 md:space-y-6">
                @csrf

                {{-- Email Input --}}
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-red-900 dark:text-white">Your email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@gmail.com" required>
                    @error('email')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password Input --}}
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-red-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="••••••••" required>
                    @error('password')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Remember Me + Forgot Password --}}
                <div class="flex items-center justify-between">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" name="remember" type="checkbox"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="remember" class="text-red-500 dark:text-gray-300">Remember me</label>
                        </div>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-sm font-medium text-red-600 hover:underline dark:text-blue-500">Forgot password?</a>
                </div>

                {{-- Login Button --}}
                <button type="submit"
                    class="w-full text-white bg-red-900 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Sign In  
                </button>

                {{-- Register Link --}}
                <p class="text-sm font-light text-red-500 dark:text-gray-400">
                    Don’t have an account yet? 
                    <a href="{{ route('signup') }}" class="font-medium text-red-600 hover:underline dark:text-blue-500">Sign up</a>
                </p>
            </form>

        </div>
      </div>
  </div>
</section>

@endsection
