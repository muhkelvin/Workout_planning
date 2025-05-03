{{-- exercises/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-poppins font-semibold text-[#2D3A4B]">
                <svg class="inline w-8 h-8 mr-2 text-[#FF7F7F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                Daftar Exercises
            </h1>
            <a href="{{ route('workouts.exercises.create', $workout) }}"
               class="bg-[#FF7F7F] text-white px-6 py-3 rounded-xl font-medium hover:bg-[#e66d6d] transition-colors shadow-lg">
                + Tambah Exercise
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-[#D1FAE5] text-[#065F46] rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if($exercises->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($exercises as $exercise)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                        <div class="p-6">
                            <h2 class="text-xl font-poppins font-semibold text-[#2D3A4B] mb-2">{{ $exercise->name }}</h2>
                            <div class="space-y-2 text-[#6D9B9B]">
                                <p class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                    </svg>
                                    {{ $exercise->sets }} sets
                                </p>
                                <p class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    {{ $exercise->repetitions }} reps
                                </p>
                                @if($exercise->weight)
                                    <p class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                                        </svg>
                                        {{ $exercise->weight }} kg
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="border-t border-[#E8C4C4] p-4 bg-[#F5F5F5]">
                            <div class="flex space-x-4">
                                <a href="{{ route('workouts.exercises.show', [$workout, $exercise]) }}"
                                   class="flex-1 text-center bg-[#6D9B9B] text-white px-4 py-2 rounded-lg hover:bg-[#5a8282] transition-colors">
                                    Detail
                                </a>
                                <a href="{{ route('workouts.exercises.edit', [$workout, $exercise]) }}"
                                   class="flex-1 text-center bg-[#E8C4C4] text-[#2D3A4B] px-4 py-2 rounded-lg hover:bg-[#d8b4b4] transition-colors">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-[#6D9B9B]">Belum ada exercise yang ditambahkan.</p>
            </div>
        @endif
    </div>
@endsection
