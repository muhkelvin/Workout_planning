<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    // Menampilkan daftar exercise untuk sebuah workout
    public function index(Workout $workout)
    {
        if ($workout->user_id !== Auth::id()) {
            abort(403);
        }

        $exercises = $workout->exercises;
        return view('exercises.index', compact('workout', 'exercises'));
    }

    // Menampilkan form untuk menambahkan exercise baru ke workout tertentu
    public function create(Workout $workout)
    {
        if ($workout->user_id !== Auth::id()) {
            abort(403);
        }

        return view('exercises.create', compact('workout'));
    }

    // Menyimpan exercise baru ke dalam workout
    public function store(Request $request, Workout $workout)
    {
        if ($workout->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'sets'        => 'required|integer|min:1',
            'repetitions' => 'required|integer|min:1',
            'weight'      => 'nullable|numeric|min:0',
        ]);

        $data['workout_id'] = $workout->id;
        Exercise::create($data);

        return redirect()->route('workouts.exercises.index', $workout)->with('success', 'Exercise berhasil ditambahkan.');
    }

    // Menampilkan detail sebuah exercise
    public function show(Workout $workout, Exercise $exercise)
    {
        if ($workout->user_id !== Auth::id() || $exercise->workout_id != $workout->id) {
            abort(403);
        }

        return view('exercises.show', compact('workout', 'exercise'));
    }

    // Menampilkan form edit untuk sebuah exercise
    public function edit(Workout $workout, Exercise $exercise)
    {
        if ($workout->user_id !== Auth::id() || $exercise->workout_id != $workout->id) {
            abort(403);
        }

        return view('exercises.edit', compact('workout', 'exercise'));
    }

    // Memperbarui data exercise
    public function update(Request $request, Workout $workout, Exercise $exercise)
    {
        if ($workout->user_id !== Auth::id() || $exercise->workout_id != $workout->id) {
            abort(403);
        }

        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'sets'        => 'required|integer|min:1',
            'repetitions' => 'required|integer|min:1',
            'weight'      => 'nullable|numeric|min:0',
        ]);

        $exercise->update($data);

        return redirect()->route('workouts.exercises.show', [$workout, $exercise])->with('success', 'Exercise berhasil diperbarui.');
    }

    // Menghapus exercise
    public function destroy(Workout $workout, Exercise $exercise)
    {
        if ($workout->user_id !== Auth::id() || $exercise->workout_id != $workout->id) {
            abort(403);
        }

        $exercise->delete();
        return redirect()->route('workouts.exercises.index', $workout)->with('success', 'Exercise berhasil dihapus.');
    }
}
