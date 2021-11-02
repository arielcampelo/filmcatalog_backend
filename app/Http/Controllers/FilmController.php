<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Film as Film;
use App\Models\Actor as Actor;
use App\Http\Resources\Film as FilmResource;
use App\Http\Resources\Filmwithcast as FilmwithcastResource;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $films = Film::paginate(5);
        return FilmResource::collection($films);
    }

    public function showall()
    {
        // get results with pagination and add cast
        $page_films =  Film::paginate(5);
        $films = array();
        foreach($page_films as $film)
         {
            // get actor information
            $cast = Actor::where('film_id', $film->id)
            ->select('id','name')
            ->orderBy('name')
            ->get();

            // add cast to array
            $film['cast'] = $cast;

            // add meta for pagination to array
            $film['meta'] = array(
                'current_page' => $page_films->currentPage(),
                'previous_page' => $page_films->currentPage()-1,
                'next_page' => $page_films->currentPage()+1,
                'last_page' => $page_films->lastPage(),
                'total' => $page_films->total()
            );

            // append to films array
            array_push($films,$film);
         }

         return FilmwithcastResource::collection($films);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $film = new Film;
        $film->title = $request->input('title');
        $film->author = $request->input('author');
        $film->year = $request->input('year');
        $film->grade = $request->input('grade');

        if($film->save() ){
        return new FilmResource($film);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $film= Film::findOrFail( $id );
        return new FilmResource( $film );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $film = Film::findOrFail( $request->id );
        $film->title = $request->input('title');
        $film->author = $request->input('author');
        $film->year = $request->input('year');
        $film->grade = $request->input('grade');

        if( $film->save() ){
            return new FilmResource($film);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $film = Film::findOrFail( $id );
        if( $film->delete() ){
        return new FilmResource( $film );
        }
    }
}
