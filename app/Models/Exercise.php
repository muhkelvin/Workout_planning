<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    /** @use HasFactory<\Database\Factories\ExerciseFactory> */
    use HasFactory;

    protected $fillable = [
        'workout_id',
        'name',
        'sets',
        'repetitions',
        'weight',
    ];

    // Relasi: Exercise milik Workout
    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }}
