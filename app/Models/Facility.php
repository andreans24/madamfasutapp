<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $table = 'facilities';

    protected $fillable = [
        'category_id',
        'gallery_id',
        'title',
        'fasilitas',
        'panjang',
        'luas',
        'lws',
        'luas_m2', // Kolom ini mengikuti nama kolom di migrasi
        'keterangan',
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
