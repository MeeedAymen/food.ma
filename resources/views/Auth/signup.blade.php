@extends('Auth.layout')
@section('title', 'Sign Up')

@section('content')
    <form class="bg-gray-200 h-screen pt-[5%]" method="POST" action="{{ route('signup') }}">
        @csrf
        <div class="flex justify-center">
            <div class="flex items-center border border-gray-300 w-full max-w-md px-6 mx-auto lg:w-2/6 rounded-xl bg-white drop-shadow-lg">
                <div class="flex-1 p-4">
                    <div class="text-center">
                        <p class="mt-3 text-3xl font-bold text-blue-500">Sign Up</p>
                    </div>
                    <div class="mt-8">
                        <div>
                            <label for="firstName" class="block mb-2 text-sm text-gray-600">First Name</label>
                            <input type="text" name="firstName" id="firstName" placeholder="First Name" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring" required>
                        </div>

                        <div class="mt-3">
                            <label for="lastName" class="block mb-2 text-sm text-gray-600">Last Name</label>
                            <input type="text" name="lastName" id="lastName" placeholder="Last name" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring" required>
                        </div>

                        <div class="mt-3">
                            <label for="phone" class="block mb-2 text-sm text-gray-600">Phone</label>
                            <input type="text" name="phone" id="phone" placeholder="Phone" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring" required>
                        </div>

                        <div class="mt-3">
                            <label for="email" class="block mb-2 text-sm text-gray-600">Email Address</label>
                            <input type="email" name="email" id="email" placeholder="name@gmail.com" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring" required>
                        </div>

                        <div class="mt-3">
                            <label for="email" class="block mb-2 text-sm text-gray-600">Email Confirmation</label>
                            <input type="email" name="email" id="email_verified_at" placeholder="name@gmail.com" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring" required>
                        </div>

                        <div class="mt-3">
                            <label for="password" class="block mb-2 text-sm text-gray-600">Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter your Password" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring" required>
                        </div>

                        <div class="flex items-center mt-3 space-x-3 flex justify-center">
                            <div class="shrink-0">
                                <img id='preview_img' class="h-12 w-12 object-cover rounded-full" src="{{ asset('storage/images/HappyFood.jpg') }}" alt="azza" />
                            </div>
                            <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input type="file" name="image" onchange="loadFile(event)" class="block w-full text-sm text-gray-500 file:mr-4 file:border-none file:py-2 file:px-4 file:rounded-2xl file:text-sm file:font-semibold file:bg-blue-200 file:text-blue-600 hover:file:text-white hover:file:bg-blue-500" />
                            </label>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                Sign up
                            </button>
                        </div>
                    </div>
                    <p class="mt-6 text-sm text-center text-gray-400">Login to your account
                        <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>.
                    </p>
                </div>
            </div>
        </div>
    </form>

    <script>
        var loadFile = function(event) {
            var input = event.target;
            var file = input.files[0];
            var output = document.getElementById('preview_img');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src); // free memory
            }
        };
    </script>
@endsection
