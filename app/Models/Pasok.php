<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasok extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_distributor', 'id_buku', 'jumlah', 'tanggal'
    ];
}
