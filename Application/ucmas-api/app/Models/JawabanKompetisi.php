<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanKompetisi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = ['ROW_ID_KOMPETISI', 'ID_PESERTA', 'SOAL_NO'];
    protected $table = 'tb_jawaban_kompetisi';
    protected $fillable = [
        "ROW_ID_KOMPETISI", "ID_PESERTA", "SOAL_NO", "PERTANYAAN", "JAWABAN_PESERTA",
        "JAWAB_DETIK_BERAPA", "JAWAB_DATE", "KUNCI_JAWABAN", "SCORE_PESERTA", "ENTRY_USER",
        "ENTRY_DATE", "UPDATE_USER", "UPDATE_DATE",
    ];
}
