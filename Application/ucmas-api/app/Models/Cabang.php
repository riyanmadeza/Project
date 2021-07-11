<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'CABANG_CODE';
    protected $table = 'tb_cabang';
    protected $fillable = [
        'CABANG_CODE', 'CABANG_NAME', 'LOKASI', 'IS_PUSAT', 'ALAMAT', 'NO_TELP', 'EMAIL', 'ENTRY_USER', 'ENTRY_DATE', 'UPDATE_USER', 'UPDATE_DATE',
    ];
}
