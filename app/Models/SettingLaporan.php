<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingLaporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_perusahaan', 'alamat', 'no_telpon', 'web', 'logo',
        'no_hp', 'email'
    ];
}
