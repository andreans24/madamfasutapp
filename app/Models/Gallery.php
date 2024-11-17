<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'category_id',
        'latitude',
        'longitude'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    public function equipts()
    {
        return $this->hasMany(Equipt::class, 'tools_category_id');
    }
}
