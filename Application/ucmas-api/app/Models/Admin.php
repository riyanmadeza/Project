<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = ['CABANG_CODE', 'USERNAME'];
    protected $table = 'tb_admin';
    protected $fillable = [
        'CABANG_CODE', 'USERNAME', 'PASSWORD_ADMIN', 'NAMA_ADMIN', 'ALAMAT_ADMIN',
        'NO_TELP_ADMIN', 'EMAIL_ADMIN', 'ENTRY_USER', 'ENTRY_DATE', 'UPDATE_USER', 'UPDATE_DATE',
    ];
}
