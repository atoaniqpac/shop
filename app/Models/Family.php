<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
    ];

    // Relacion uno a muchos
    public function category()
    {
        return $this->hasMany(Category::class);
    }

}

