<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolsCategory extends Model
{
    use HasFactory;

    protected $table = 'tools_category';

    protected $fillable = ['nama_peralatan'];

    public function equipts()
    {
        return $this->hasMany(Equipt::class);
    }
}
