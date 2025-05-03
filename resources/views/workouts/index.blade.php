@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-poppins font-semibold text-[#2D3A4B]">Workout Plans</h1>
            <a href="{{ route('workouts.create') }}"
               class="bg-[#FF7F7F] text-white px-6 py-3 rounded-xl font-medium hover:bg-[#e66d6d] transition-colors shadow-lg">
                + Create New Workout
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-[#D1FAE5] text-[#065F46] rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if($workouts->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($workouts as $workout)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                        <div class="p-6">
                            <h2 class="text-xl font-poppins font-semibold text-[#2D3A4B] mb-2">{{ $workout->title }}</h2>
                            <p class="text-[#6D9B9B] mb-4">
                                <svg class="inline w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ \Carbon\Carbon::parse($workout->scheduled_at)->format('d M Y, H:i') }}
                            </p>
                            <div class="flex space-x-4">
                                <a href="{{ route('workouts.show', $workout) }}"
                                   class="flex-1 text-center bg-[#6D9B9B] text-white px-4 py-2 rounded-lg hover:bg-[#5a8282] transition-colors">
                                    View
                                </a>
                                <a href="{{ route('workouts.edit', $workout) }}"
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
                <p class="text-[#6D9B9B]">No workout plans created yet.</p>
            </div>
        @endif
    </div>
@endsection
