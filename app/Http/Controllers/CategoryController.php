<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function recipes(Category $category) {
        $recipes = $category->recipes;

        return view('category.recipes', compact(['recipes', 'category']));
    }

    public function all() {
        $categories = Category::all();

        return view('category.all', compact('categories'));
    }
}
