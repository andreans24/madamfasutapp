<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'fasilitas',
        'unit',
        'kapasitas',
        'kondisi',
        'category_id',
        'gallery_id',
        'tools_category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function toolsCategory()
    {
        return $this->belongsTo(ToolsCategory::class, 'tools_category_id');
    }
}
