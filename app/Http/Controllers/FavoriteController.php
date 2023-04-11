<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoriteCreateRequest;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Favorite::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FavoriteCreateRequest $request)
    {
        $recipeId = $request->validated()['recipe_id'];
        $recipeText = $request->validated()['recipe_text'];

        $favorite = Favorite::where('recipe_id', $recipeId)->first();

        if ($favorite === null) {
            Favorite::create([
                'recipe_id' => $recipeId,
                'recipe_text' => $recipeText
            ]);
        } else {
            $favorite->delete();
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite $favorite)
    {
        //
    }
}
