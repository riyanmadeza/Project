<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPerlombaan extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'JENIS_CODE';
    protected $table = 'tb_jenis_perlombaan';
    protected $fillable = [
        'JENIS_CODE', 'JENIS_NAME', 'TIPE', 'ENTRY_USER', 'ENTRY_DATE', 'UPDATE_USER', 'UPDATE_DATE',
    ];
}
