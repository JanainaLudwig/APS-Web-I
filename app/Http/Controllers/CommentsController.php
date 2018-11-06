<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Recipe;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Recipe $recipe) {
        $this->validate(request(), [
            'body' => 'required'
        ]);

        $recipe->addComment(\request('body'));

        return back();
    }

    public function delete(Comment $comment) {
        if ($comment->user->id == auth()->user()->id) {
            $comment->delete();
        }

        return back();
    }
}
