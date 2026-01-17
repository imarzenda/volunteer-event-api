<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'event_date',
    ];

    // RELASI: event punya banyak user
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
