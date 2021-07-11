<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaKompetisi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = ['ROW_ID_KOMPETISI', 'ID_PESERTA'];
    protected $table = 'tb_peserta_kompetisi';
    protected $fillable = [
        "ROW_ID_KOMPETISI", "ID_PESERTA", "ENTRY_USER", "ENTRY_DATE", "UPDATE_USER", "UPDATE_DATE",
    ];
}
