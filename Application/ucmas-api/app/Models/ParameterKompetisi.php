<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterKompetisi extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = ['ROW_ID_KOMPETISI', 'PARAMETER_ID'];
    protected $table = 'tb_parameter_kompetisi';
    protected $fillable = [
        'ROW_ID_KOMPETISI', 'PARAMETER_ID', 'SOAL_DARI', 'SOAL_SAMPAI', 'PANJANG_DIGIT', 'JUMLAH_MUNCUL',
        'JML_BARIS_PER_MUNCUL', 'MAX_PANJANG_DIGIT', 'MAX_JML_DIGIT_PER_SOAL', 'JML_BARIS_PER_SOAL',
        'MUNCUL_ANGKA_MINUS', 'MUNCUL_ANGKA_PERKALIAN', 'DIGIT_PERKALIAN', 'MUNCUL_ANGKA_PEMBAGIAN',
        'DIGIT_PEMBAGIAN', 'MUNCUL_ANGKA_DECIMAL', 'DIGIT_DECIMAL', 'FONT_SIZE', 'KECEPATAN', 'ENTRY_USER',
        'ENTRY_DATE', 'UPDATE_USER', 'UPDATE_DATE',
    ];
}
