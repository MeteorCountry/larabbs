<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'description',
    ];
}
