<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\Transaksi;

class Tiket extends Model
{
    use HasFactory;

    protected $table = "tiket";
    protected $fillable = [
        'id',
        'id_event',
        'jumlah_tiket',
        'harga_tiket',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event', 'id');
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id_transaksi', 'id');
    }
}
