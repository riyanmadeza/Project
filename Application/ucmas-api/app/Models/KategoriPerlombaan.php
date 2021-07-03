<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPerlombaan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = ['JENIS_CODE', 'KATEGORI_CODE'];
    protected $table = 'tb_kategori_perlombaan';
    protected $fillable = [
        'JENIS_CODE', 'KATEGORI_CODE', 'KATEGORI_NAME', 'LAMA_PERLOMBAAN', 'ENTRY_USER', 'ENTRY_DATE', 'UPDATE_USER', 'UPDATE_DATE',
    ];
}
