<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeListController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function show(Request $request)
    {
        // 自分が登録したレシピを取り出す
        $recipe_list = Recipe::where('user_id', '=', \Auth::id())->orderBy('id', 'desc')->paginate(10);

        return view('recipe.recipe_list', [
            'recipe_list' => $recipe_list,
        ]);
    }
}
