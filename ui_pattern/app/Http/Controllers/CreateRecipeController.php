<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Auth;

class CreateRecipeController extends Controller
{
    /**
     * バリデーションルール
     */
    protected $validationRules = [
        'name' => ['required', 'string'],
        'url' => ['nullable', 'url'],
        'description' => ['nullable', 'string'],
    ];

    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * レシピ登録フォームを表示
     */
    function create()
    {
        return view('recipe.recipe_create_form');
    }

    /**
     * レシピ登録フォームからの遷移先
     */
    function store(Request $request)
    {
        // 入力値の受け取り
        $validatedData = $request->validate($this->validationRules);

        // 作成するユーザIDを設定
        $validatedData['user_id'] = Auth::id();

        // レシピの保存
        $new = Recipe::create($validatedData);

        // 登録後はダッシュボードに移動
        return redirect()->route('dashboard');
    }
}
