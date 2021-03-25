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
    
    /**
     * set payload data for posts table.
     * 
     * @param Request $request [description]
     * @return array of data for saving.
     */
    protected function setDataPayload(Request $request)
    {
        return [
            'cinema_id' => $request->input('cinema_id'),
            'movie_id' => $request->input('movie_id'),
            'time' => $request->input('time'),
        ];
    }
}