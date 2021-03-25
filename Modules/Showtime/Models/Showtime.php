<?php

namespace Modules\Showtime\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function movie() {
        return $this->belongsTo(\Modules\Movie\Models\Movie::class);
    }

    public function cinema() {
        return $this->belongsTo(\Modules\Cinema\Models\Cinema::class);
    }
}
