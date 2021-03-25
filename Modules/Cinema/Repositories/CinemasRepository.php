<?php

namespace Modules\Cinema\Repositories;

use Modules\Cinema\Models\Cinema;
use App\Repositories\AppRepository;
use Illuminate\Http\Request;

class CinemasRepository extends AppRepository
{
    protected $model;
    
    public function __construct(Cinema $model)
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
            'name' => $request->input('name'),
        ];
    }
}