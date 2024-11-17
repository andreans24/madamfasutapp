<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function equipts()
    {
        return $this->hasMany(Equipt::class, 'category_id');
    }
}
