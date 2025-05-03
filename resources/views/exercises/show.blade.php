{{-- exercises/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-8">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center mb-6">
                <svg class="w-8 h-8 text-[#FF7F7F] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                <h1 class="text-3xl font-poppins font-semibold text-[#2D3A4B]">{{ $exercise->name }}</h1>
            </div>

            <div class="space-y-4 mb-8">
                <div class="bg-[#F5F5F5] p-4 rounded-lg">
                    <p class="text-[#6D9B9B] font-medium">Sets</p>
                    <p class="text-2xl text-[#2D3A4B]">{{ $exercise->sets }}</p>
                </div>

                <div class="bg-[#F5F5F5] p-4 rounded-lg">
                    <p class="text-[#6D9B9B] font-medium">Repetisi</p>
                    <p class="text-2xl text-[#2D3A4B]">{{ $exercise->repetitions }}</p>
                </div>

                @if($exercise->weight)
                    <div class="bg-[#F5F5F5] p-4 rounded-lg">
                        <p class="text-[#6D9B9B] font-medium">Berat</p>
                        <p class="text-2xl text-[#2D3A4B]">{{ $exercise->weight }} kg</p>
                    </div>
                @endif
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('workouts.exercises.edit', [$workout, $exercise]) }}"
                   class="bg-[#FF7F7F] text-white px-6 py-2 rounded-lg hover:bg-[#e66d6d] transition-colors">
                    Edit
                </a>
                <form action="{{ route('workouts.exercises.destroy', [$workout, $exercise]) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-[#E8C4C4] text-[#2D3A4B] px-6 py-2 rounded-lg hover:bg-[#d8b4b4] transition-colors"
                            onclick="return confirm('Hapus exercise ini?')">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
