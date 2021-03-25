<?php

namespace Modules\Movie\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Movie\Repositories\MoviesRepository;
use Modules\Movie\Http\Requests\CreateMovieRequest;

use Modules\Cinema\Repositories\CinemasRepository;
use Modules\Cinema\Models\Cinema;

class MovieController extends Controller
{
    protected $repository;
  
    public function __construct(MoviesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $movies = $this->repository->with('showtimes')->paginate($request->limit);
        return view('movie::index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $movies = $this->repository->paginate($request);
        return view('movie::create', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateMovieRequest $request)
    {
        try {
            $this->repository->store($request);
            return redirect()->route('movies.create')->with('success', 'Successful!');

        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request, $id)
    {
        $movie = $this->repository->show($id);
        $cinemas = Cinema::all();
        return view('movie::show', compact('movie', 'cinemas'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('movie::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
