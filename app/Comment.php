<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function recipe() {
        return $this->belongsTo(Recipe::class);
    }
}
