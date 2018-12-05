<?php

namespace App\Http\Controllers;

use App\Category;
use App\Ingredient;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class RecipesController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show', 'search', 'all', 'ingredients']);
    }

    public function index(Recipe $recipe) {
        //Get 8 most viewed recipes
        $recipes = $recipe->where('views', '!=', 0)->orderBy('views', 'created_at', 'desc')->limit(8)->get();

        return view('welcome', compact(['recipes']));
    }

    public function all(Recipe $recipe) {
        //Get 8 most viewed recipes
        $recipes = $recipe->orderBy('views', 'desc', 'title', 'asc')->paginate(8);

        return view('recipe.all', compact(['recipes']));
    }

    public function search(Request $request) {
        $search = $request->get('search');

        $recipes = Recipe::where('title', 'like', '%' . $search . '%')->paginate(8);

        return view('recipe.search', compact(['recipes', 'search']));
    }

    public function show(Recipe $recipe) {
        $recipe->views++;
        $recipe->save();

        $comments = $recipe->comments;

        $records = $recipe->all();
        $rand = rand(0, $records->count() - 1);

        $other_recipes = $recipe->skip($rand-5)->take(5)->get();

        return view('recipe.show', compact(['recipe', 'comments', 'other_recipes']));
    }

    public function create() {
        $categories = Category::orderBy('name')->get();

        return view('recipe.create', compact('categories'));
    }

    public function ingredients(Recipe $recipe) {

        return $recipe->ingredients;
    }

    public function store(Recipe $recipe, Request $request) {
        $this->validate(request(), [
            'title' => 'required|min:2|max:50',
            'body' => 'required|min:5',
            'yield' => 'required',
            'time' => 'required'
        ]);

        $recipe = new Recipe(request(['title', 'body', 'yield', 'time']));
        auth()->user()->publishRecipe($recipe);

        $category = Category::find(request('category'));
        $recipe->categories()->attach($category);


        if(\request('image')) {
            $image = \request('image');
            $filename = $recipe->id . '.' . $image->getClientOriginalExtension();
            $request->file('image')->storeAs(
                '/public/recipes', $filename
            );
            $recipe->image = $filename;

        }

        $recipe->save();

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
