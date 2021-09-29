<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KompetisiTrial extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ROW_ID';
    protected $table = 'tb_kompetisi_trial';
    protected $fillable = [
        "ROW_ID", "CABANG_CODE", "KOMPETISI_NAME", "TANGGAL_KOMPETISI", "JAM_MULAI",
        "JAM_SAMPAI", "JENIS_CODE", "JENIS_NAME", "TIPE", "ROW_ID_KATEGORI", "KATEGORI_CODE",
        "KATEGORI_NAME", "LAMA_PERLOMBAAN", "KECEPATAN",
        "ENTRY_USER", "ENTRY_DATE", "UPDATE_USER", "UPDATE_DATE",
    ];
}