<?php

namespace Modules\Showtime\Repositories;

use Modules\Showtime\Models\Showtime;
use App\Repositories\AppRepository;
use Illuminate\Http\Request;

class ShowtimesRepository extends AppRepository
{
    protected $model;
    
    public function __construct(Showtime $model)
    {
        $this->model = $model;
    }
    

    public function store(Request $request)
    {
        $item = $this->model;
        $item->updateOrCreate($request->only('movie_id', 'cinema_id'), $request->only('time'));
        return $item;
    }
}