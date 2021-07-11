<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Peserta extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    //public $incrementing = false;
    protected $primaryKey = 'ID_PESERTA';
    protected $table = 'tb_peserta';
    protected $fillable = [
        'ID_PESERTA', 'NAMA_PESERTA', 'JENIS_KELAMIN', 'TEMPAT_LAHIR', 'TANGGAL_LAHIR', 'ALAMAT_PESERTA',
        'SEKOLAH_PESERTA', 'NO_TELP_PESERTA', 'EMAIL_PESERTA', 'IS_USMAS', 'PASSWORD_PESERTA', 'CABANG_CODE',
        'ENTRY_USER', 'ENTRY_DATE', 'UPDATE_USER', 'UPDATE_DATE',
    ];

}
