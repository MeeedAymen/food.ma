@extends('Auth.layout')
@section('title', 'Login')

@section('content')
    <form class="bg-gray-200 h-screen pt-[14%]" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="flex justify-center">
            <div class="flex items-center border border-gray-300 w-full max-w-md px-6 mx-auto lg:w-2/6 rounded-xl bg-white drop-shadow-lg">
                <div class="flex-1 p-4">
                    <div class="text-center">
                        <p class="mt-3 text-3xl font-bold text-blue-500">Sign In</p>
                    </div>
                    <div class="mt-8">
                        <div>
                            <div>
                                <label for="email" class="block mb-2 text-sm text-gray-600">Email Address</label>
                                <input type="email" name="email" id="email" placeholder="Your@email.com" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring" required>
                            </div>
                            <div class="mt-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password" class="text-sm text-gray-600">Password</label>
                                </div>
                                <input type="password" name="password" id="password" placeholder="Your Password" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring" required>
                            </div>
                            <div class="mt-6">
                                <button type="submit" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                    Sign in
                                </button>
                            </div>
                        </div>
                        <p class="mt-6 text-sm text-center text-gray-400">Don't have an account yet?
                            <a href="{{ route('signup') }}" class="text-blue-500 hover:underline">Sign up</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
