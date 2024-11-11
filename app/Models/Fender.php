<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fender extends Model
{
    use HasFactory;

    protected $table = 'fenders';

    protected $fillable = [
        'fasilitas',
        'baik',
        'rusak',
        // 'jumlah',
        'category_id',
        'gallery_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
