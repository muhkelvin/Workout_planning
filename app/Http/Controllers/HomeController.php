<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Menampilkan dashboard pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mengambil 5 workout terjadwal terbaru milik user untuk ditampilkan sebagai ringkasan
        $workouts = Workout::where('user_id', $user->id)
            ->orderBy('scheduled_at', 'asc')
            ->take(5)
            ->get();

        return view('home', compact('user', 'workouts'));
    }
}
