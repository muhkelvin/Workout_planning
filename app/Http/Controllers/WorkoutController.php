<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    // Menampilkan daftar workout untuk user yang sedang login
    public function index()
    {
        $workouts = Workout::where('user_id', Auth::id())->orderBy('scheduled_at')->get();
        return view('workouts.index', compact('workouts'));
    }

    // Menampilkan form untuk membuat workout baru
    public function create()
    {
        return view('workouts.create');
    }

    // Menyimpan workout baru ke database
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'scheduled_at' => 'required|date',
            'comment'      => 'nullable|string',
        ]);

        // Pastikan workout dikaitkan dengan user yang sedang login
        $data['user_id'] = Auth::id();

        $workout = Workout::create($data);

        return redirect()->route('workouts.show', $workout)->with('success', 'Workout berhasil dibuat.');
    }

    // Menampilkan detail workout
    public function show(Workout $workout)
    {
        // Optional: Cek apakah workout milik user yang sedang login
        if ($workout->user_id !== Auth::id()) {
            abort(403);
        }

        // Load relasi exercises jika diperlukan
        $workout->load('exercises');
        return view('workouts.show', compact('workout'));
    }

    // Menampilkan form untuk mengedit workout
    public function edit(Workout $workout)
    {
        if ($workout->user_id !== Auth::id()) {
            abort(403);
        }

        return view('workouts.edit', compact('workout'));
    }

    // Memperbarui data workout
    public function update(Request $request, Workout $workout)
    {
        if ($workout->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'scheduled_at' => 'required|date',
            'comment'      => 'nullable|string',
        ]);

        $workout->update($data);

        return redirect()->route('workouts.show', $workout)->with('success', 'Workout berhasil diperbarui.');
    }

    // Menghapus workout dari database
    public function destroy(Workout $workout)
    {
        if ($workout->user_id !== Auth::id()) {
            abort(403);
        }

        $workout->delete();
        return redirect()->route('workouts.index')->with('success', 'Workout berhasil dihapus.');
    }
}
