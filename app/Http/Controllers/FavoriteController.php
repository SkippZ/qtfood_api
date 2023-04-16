<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoriteCreateRequest;
use App\Models\Favorite;

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
}
