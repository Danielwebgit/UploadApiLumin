<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;


class RecipeController extends Controller
{
    protected $recipe;

    public function __construct( Recipe $recipe)
    {
        $this->recipe=$recipe;
    }



    public function ingredients()
    {
        return response()->json(Recipe::all());
    }

    public function findAll( Recipe $recipe): array
    {
        return $this->recipe=json_decode($recipe->all());

    }


    public function lunch()
    {

       $recipe=$this->findAll();
        dd($recipe);
    }
}
