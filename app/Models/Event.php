<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserEvent;
use App\Models\Tiket;

class Event extends Model
{
    use HasFactory;

    protected $table = "event";
    protected $fillable = [
        'id',
        'id_userEvent',
        'nama_event',
        'deskripsi_event',
        'foto_event',
        'lokasi',
        'waktu',
        'tanggal_event',
        'status',
        'kategori_id',
    ];

    public function userEvent()
    {
        return $this->belongsTo(UserEvent::class, 'id_userEvent', 'id');
    }

    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'id_tiket', 'id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

}
