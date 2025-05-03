{{-- home.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
            <h1 class="text-4xl font-poppins font-semibold text-[#2D3A4B] mb-4">
                Selamat Datang, {{ $user->name }}! 👋
            </h1>
            <p class="text-[#6D9B9B]">
                Mulai perjalanan fitness Anda hari ini. Tetap konsisten dan raih tujuan Anda!
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-3xl font-poppins font-semibold text-[#2D3A4B] mb-6">
                <svg class="inline w-8 h-8 mr-2 text-[#FF7F7F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                Workout Terjadwal
            </h2>

            @if($workouts->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($workouts as $workout)
                        <div class="bg-[#F5F5F5] rounded-xl p-6 hover:bg-[#E8C4C4] transition-colors">
                            <h3 class="text-xl font-poppins font-semibold text-[#2D3A4B] mb-2">{{ $workout->title }}</h3>
                            <div class="text-[#6D9B9B] mb-4">
                                <p class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($workout->scheduled_at)->format('d M Y, H:i') }}
                                </p>
                            </div>
                            @if($workout->comment)
                                <div class="bg-white p-4 rounded-lg mb-4">
                                    <p class="text-[#6D9B9B] italic">{{ $workout->comment }}</p>
                                </div>
                            @endif
                            <a href="{{ route('workouts.show', $workout) }}"
                               class="bg-[#FF7F7F] text-white px-4 py-2 rounded-lg hover:bg-[#e66d6d] transition-colors inline-block">
                                Lihat Detail
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-[#6D9B9B] mb-4">Anda belum memiliki workout terjadwal.</p>
                    <a href="{{ route('workouts.create') }}"
                       class="bg-[#FF7F7F] text-white px-6 py-3 rounded-lg hover:bg-[#e66d6d] transition-colors">
                        Buat Workout Sekarang
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
