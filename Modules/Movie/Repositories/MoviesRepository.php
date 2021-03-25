<?php

namespace Modules\Movie\Repositories;

use Modules\Movie\Models\Movie;
use App\Repositories\AppRepository;
use Illuminate\Http\Request;

class MoviesRepository extends AppRepository
{
    protected $model;
    
    public function __construct(Movie $model)
    {
        $this->model = $model;
    }
    
    /**
     * set payload data for movies table.
     * 
     * @param Request $request [description]
     * @return array of data for saving.
     */
    protected function setDataPayload(Request $request)
    {
        return [
            'title' => $request->input('title'),
        ];
    }
}