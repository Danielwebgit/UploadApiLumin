<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany as ingredients;

class Recipe extends Model
{
    protected $table = 'recipe';

    public function ingredient()
    {
        return $this->hasMany(Ingredient::class,'id_recipe','id');

    }
}
