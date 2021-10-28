<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Actor as Actor;
use App\Http\Resources\Actor as ActorResource;

use Illuminate\Support\Facades\DB;


class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $actors = Actor::paginate(5);
        return ActorResource::collection($actors);
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
        $actor = new Actor;
        $actor->film_id = $request->input('film_id');
        $actor->name = $request->input('name');
        if($actor->save() ){
        return new ActorResource($actor);
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
        $actor= Actor::findOrFail( $id );
        return new ActorResource( $actor );
    }

    public function showactors($id)
    {
        $actors = DB::table('actors')->where('film_id', '=', $id)->get();
        return ActorResource::collection($actors);
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
        $actor = Actor::findOrFail( $request->id );
        $actor->film_id = $request->input('film_id');
        $actor->name = $request->input('name');
        if( $actor->save() ){
            return new ActorResource($actor);
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
        $actor = Actor::findOrFail( $id );
        if( $actor->delete() ){
        return new ActorResource( $actor );
        }
    }
}
