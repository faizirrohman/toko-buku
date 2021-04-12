<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasok extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_pasok', 'id_distributor', 'id_buku', 'jumlah', 'tanggal'
    ];

    public function namaDistributor() {
        return $this->belongsTo(Distributor::class, 'id_distributor');
    }
    public function kodeBuku() {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}
