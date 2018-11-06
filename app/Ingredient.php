<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public $timestamps = false;

    public function recipe() {
        return $this->belongsTo(Recipe::class);
    }
}
