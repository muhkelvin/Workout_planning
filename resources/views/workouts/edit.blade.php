{{-- edit.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-8">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h1 class="text-3xl font-poppins font-semibold text-[#2D3A4B] mb-6">Edit Workout</h1>

            @if($errors->any())
                <div class="mb-6 p-4 bg-[#F8D7DA] rounded-lg">
                    <ul class="list-disc list-inside text-[#721C24]">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('workouts.update', $workout) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="title" class="block font-medium text-[#6D9B9B] mb-2">Workout Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $workout->title) }}"
                           class="w-full border-2 border-[#E8C4C4] rounded-xl p-3 focus:outline-none focus:border-[#6D9B9B] transition-colors placeholder-[#9CA3AF]">
                </div>

                <div>
                    <label for="scheduled_at" class="block font-medium text-[#6D9B9B] mb-2">Schedule</label>
                    <input type="datetime-local" name="scheduled_at" id="scheduled_at"
                           value="{{ old('scheduled_at', \Carbon\Carbon::parse($workout->scheduled_at)->format('Y-m-d\TH:i')) }}"
                           class="w-full border-2 border-[#E8C4C4] rounded-xl p-3 focus:outline-none focus:border-[#6D9B9B] transition-colors">
                </div>

                <div>
                    <label for="comment" class="block font-medium text-[#6D9B9B] mb-2">Notes (Optional)</label>
                    <textarea name="comment" id="comment" rows="4"
                              class="w-full border-2 border-[#E8C4C4] rounded-xl p-3 focus:outline-none focus:border-[#6D9B9B] transition-colors placeholder-[#9CA3AF]">{{ old('comment', $workout->comment) }}</textarea>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('workouts.index') }}"
                       class="bg-[#E8C4C4] text-[#2D3A4B] px-6 py-2 rounded-lg hover:bg-[#d8b4b4] transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                            class="bg-[#FF7F7F] text-white px-6 py-2 rounded-lg hover:bg-[#e66d6d] transition-colors">
                        Update Workout
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
