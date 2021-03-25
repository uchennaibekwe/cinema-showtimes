<?php

namespace Modules\Cinema\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function showtimes() {
        return $this->hasMany(Modules\Showtime\Models\Showtime::class);
    }
}
