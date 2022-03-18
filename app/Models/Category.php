<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

    public function getIsset() {
        return $this->attributes['isset'];
    }
}
