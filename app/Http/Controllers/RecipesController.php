<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipe;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Recipe $recipe) {
        $recipes = $recipe->orderBy('created_at', 'desc')->paginate(8);

        return view('welcome', compact('recipes'));
    }

    public function show(Recipe $recipe) {
        $comments = $recipe->comments;

        return view('recipe.show', compact(['recipe', 'comments']));
    }

    public function create() {
        return view('recipe.create');
    }

    public function store(Recipe $recipe, Request $request) {
        $this->validate(request(), [
            'title' => 'required|min:2|max:50',
            'body' => 'required|min:5'
        ]);

        $recipe = new Recipe(request(['title', 'body']));
        auth()->user()->publishRecipe($recipe);

        if(\request('image')) {
            $image = \request('image');
            $filename = $recipe->id . '.' . $image->getClientOriginalExtension();
            $request->file('image')->storeAs(
                '/public/recipes', $filename
            );
            $recipe->image = $filename;
            $recipe->save();
        }

        $ingredients = \request('ingredient');

        foreach ($ingredients as $ingredient) {
            $newIngredient = new Ingredient;
            $newIngredient->name = $ingredient['name'];
            $newIngredient->quantity = $ingredient['quantity'];
            $newIngredient->measure = $ingredient['measure'];
            $newIngredient->recipe_id = $recipe->id;

            $newIngredient->save();
        }

        return redirect('/recipes/' . $recipe->id);
    }

}
