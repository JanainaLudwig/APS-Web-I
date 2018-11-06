<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['title', 'body', 'ingredient.*'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function addComment($body) {
        $this->comments()->create(['body' => $body, 'user_id' => auth()->user()->id]);
    }

    public function ingredients() {
        return $this->hasMany(Ingredient::class);
    }
}
