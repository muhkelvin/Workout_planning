<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    /** @use HasFactory<\Database\Factories\WorkoutFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'scheduled_at',
        'comment',
    ];

    // Relasi: Workout dimiliki oleh User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Workout memiliki banyak Exercise
    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }}
