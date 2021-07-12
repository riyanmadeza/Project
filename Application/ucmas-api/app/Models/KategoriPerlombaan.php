<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPerlombaan extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ROW_ID';
    protected $table = 'tb_kategori_perlombaan';
    protected $fillable = [
        'ROW_ID', 'JENIS_CODE', 'KATEGORI_CODE', 'KATEGORI_NAME', 'LAMA_PERLOMBAAN',
        'KECEPATAN', 'ENTRY_USER', 'ENTRY_DATE', 'UPDATE_USER', 'UPDATE_DATE',
    ];
}
