{{-- exercises/edit.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-8">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h1 class="text-3xl font-poppins font-semibold text-[#2D3A4B] mb-6">
                <svg class="inline w-8 h-8 mr-2 text-[#FF7F7F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                </svg>
                Edit Exercise
            </h1>

            @if($errors->any())
                <div class="mb-6 p-4 bg-[#F8D7DA] rounded-lg">
                    <ul class="list-disc list-inside text-[#721C24]">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('workouts.exercises.update', [$workout, $exercise]) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="block font-medium text-[#6D9B9B] mb-2">Nama Exercise</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $exercise->name) }}"
                           class="w-full border-2 border-[#E8C4C4] rounded-xl p-3 focus:outline-none focus:border-[#6D9B9B] transition-colors">
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="sets" class="block font-medium text-[#6D9B9B] mb-2">Sets</label>
                        <input type="number" name="sets" id="sets" value="{{ old('sets', $exercise->sets) }}"
                               class="w-full border-2 border-[#E8C4C4] rounded-xl p-3 focus:outline-none focus:border-[#6D9B9B] transition-colors">
                    </div>

                    <div>
                        <label for="repetitions" class="block font-medium text-[#6D9B9B] mb-2">Repetisi</label>
                        <input type="number" name="repetitions" id="repetitions" value="{{ old('repetitions', $exercise->repetitions) }}"
                               class="w-full border-2 border-[#E8C4C4] rounded-xl p-3 focus:outline-none focus:border-[#6D9B9B] transition-colors">
                    </div>
                </div>

                <div>
                    <label for="weight" class="block font-medium text-[#6D9B9B] mb-2">Berat (kg)</label>
                    <input type="number" step="0.1" name="weight" id="weight" value="{{ old('weight', $exercise->weight) }}"
                           class="w-full border-2 border-[#E8C4C4] rounded-xl p-3 focus:outline-none focus:border-[#6D9B9B] transition-colors">
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('workouts.show', $workout) }}"
                       class="bg-[#E8C4C4] text-[#2D3A4B] px-6 py-2 rounded-lg hover:bg-[#d8b4b4] transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                            class="bg-[#FF7F7F] text-white px-6 py-2 rounded-lg hover:bg-[#e66d6d] transition-colors">
                        Update Exercise
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
