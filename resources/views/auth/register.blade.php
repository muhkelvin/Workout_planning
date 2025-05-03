@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-lg p-8 mt-12 scroll-animation">
        <h2 class="text-3xl font-poppins font-semibold text-[#2D3A4B] mb-8 text-center">Create Account</h2>

        @if($errors->any())
            <div class="mb-6 p-4 bg-[#F8D7DA] rounded-lg">
                <ul class="list-disc list-inside text-[#721C24]">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block font-medium text-[#6D9B9B] mb-2">Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="w-full border-2 border-[#E8C4C4] rounded-xl p-3 focus:outline-none focus:border-[#6D9B9B] transition-colors placeholder-[#9CA3AF]">
            </div>

            <div>
                <label for="email" class="block font-medium text-[#6D9B9B] mb-2">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="w-full border-2 border-[#E8C4C4] rounded-xl p-3 focus:outline-none focus:border-[#6D9B9B] transition-colors placeholder-[#9CA3AF]">
            </div>

            <div>
                <label for="password" class="block font-medium text-[#6D9B9B] mb-2">Password</label>
                <input type="password" name="password" id="password"
                       class="w-full border-2 border-[#E8C4C4] rounded-xl p-3 focus:outline-none focus:border-[#6D9B9B] transition-colors placeholder-[#9CA3AF]">
            </div>

            <div>
                <label for="password_confirmation" class="block font-medium text-[#6D9B9B] mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="w-full border-2 border-[#E8C4C4] rounded-xl p-3 focus:outline-none focus:border-[#6D9B9B] transition-colors placeholder-[#9CA3AF]">
            </div>

            <button type="submit"
                    class="w-full bg-[#FF7F7F] text-white py-3 rounded-xl font-poppins font-medium hover:bg-[#e66d6d] transition-colors shadow-lg">
                Create Account
            </button>

            <p class="text-center text-[#6D9B9B]">
                Already have an account?
                <a href="{{ route('login') }}" class="text-[#FF7F7F] hover:text-[#e66d6d] transition-colors font-medium">Login here</a>
            </p>
        </form>
    </div>
@endsection
