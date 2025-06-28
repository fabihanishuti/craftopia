@extends('layouts.app')

@section('body_content')

<section class="max-w-screen w-full h-full bg-blue-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center pt-7 pb-8">
        <a href="#" class="flex items-center mb-6 text-2xl font-extrabold text-blue-800 dark:text-white">
            Account Settings
        </a>

        <div class="w-full bg-blue-100 rounded-lg shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-blue-900 md:text-2xl dark:text-white">
                    My Profile
                </h1>

                @if(session('success'))
                    <div class="mb-4 text-green-700 bg-green-100 p-4 rounded-lg shadow-md">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="mb-4 text-red-700 bg-red-100 p-4 rounded-lg shadow-md">
                        {{ session('error') }}
                    </div>
                @endif

                <img src="{{ asset('uploads/profiles/' . $user->picture) }}"
                     onerror="this.onerror=null; this.src='{{ asset('images/default.jpg') }}';"
                     alt="{{ $user->fullname }}"
                     class="w-24 h-24 mx-auto object-cover rounded-full">

                <form method="POST" action="{{ route('updateUser') }}" class="space-y-4 md:space-y-6" enctype="multipart/form-data">
                    @csrf
                    
                    <div>
                        <label for="fullname" class="block mb-2 text-sm font-medium text-blue-900 dark:text-white">Full Name</label>
                        <input type="text" name="fullname" id="fullname" value="{{ old('fullname', $user->fullname) }}" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" 
                               placeholder="name" required>
                        @error('fullname')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-blue-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}"
                               class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" readonly>
                    </div>

                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-blue-900 dark:text-white">New Password</label>
                        <input type="password" name="password" id="password"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                               placeholder="Enter new password" required>
                        @error('password')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="file" class="block mb-2 text-sm font-medium text-blue-900 dark:text-white">Upload Profile Picture</label>
                        <input type="file" name="file" id="file" accept="image/*"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @error('file')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none 
                                   focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 
                                   dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Save Changes
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
