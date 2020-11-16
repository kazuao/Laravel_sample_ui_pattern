<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'user_recipe';
    protected $fillable = ['name', 'url', 'description', 'user_id'];
}
