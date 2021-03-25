<?php

namespace Modules\Movie\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function showtimes() {
        return $this->hasMany(Modules\Showtime\Models\Showtime::class);
    }
}
