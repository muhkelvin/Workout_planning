{{-- show.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h1 class="text-3xl font-poppins font-semibold text-[#2D3A4B] mb-4">{{ $workout->title }}</h1>
            <div class="flex items-center text-[#6D9B9B] mb-6">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span>{{ \Carbon\Carbon::parse($workout->scheduled_at)->format('d M Y, H:i') }}</span>
            </div>

            @if($workout->comment)
                <div class="bg-[#F5F5F5] p-4 rounded-lg mb-6">
                    <p class="text-[#6D9B9B] italic">{{ $workout->comment }}</p>
                </div>
            @endif

            <div class="flex space-x-4 mb-8">
                <a href="{{ route('workouts.exercises.index', $workout) }}"
                   class="bg-[#FF7F7F] text-white px-6 py-2 rounded-lg hover:bg-[#e66d6d] transition-colors">
                    View Exercises
                </a>
                <a href="{{ route('workouts.edit', $workout) }}"
                   class="bg-[#E8C4C4] text-[#2D3A4B] px-6 py-2 rounded-lg hover:bg-[#d8b4b4] transition-colors">
                    Edit Workout
                </a>
            </div>

            @if($workout->exercises->count())
                <div>
                    <h2 class="text-2xl font-poppins font-semibold text-[#2D3A4B] mb-4">Exercises</h2>
                    <div class="space-y-4">
                        @foreach($workout->exercises as $exercise)
                            <div class="p-4 bg-[#F5F5F5] rounded-lg">
                                <h3 class="text-xl font-medium text-[#2D3A4B]">{{ $exercise->name }}</h3>
                                <div class="text-[#6D9B9B]">
                                    <span>{{ $exercise->sets }} sets</span> •
                                    <span>{{ $exercise->repetitions }} reps</span>
                                    @if($exercise->weight)
                                        • <span>{{ $exercise->weight }} kg</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-[#6D9B9B]">No exercises added yet.</p>
            @endif
        </div>
    </div>
@endsection
