<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "kategori";
    protected $fillable = [
        'id',
        'nama_kategori',
    ];

    public function event()
    {
        return $this->hasMany(Event::class, 'kategori_id');
    }

}
