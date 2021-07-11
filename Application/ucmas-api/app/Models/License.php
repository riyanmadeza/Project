<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'CABANG_CODE';
    protected $table = 'tb_license';
    protected $fillable = [
        'CABANG_CODE', 'DATEFROM', 'DATETO', 'ENTRY_USER', 'ENTRY_DATE', 'UPDATE_USER', 'UPDATE_DATE',
    ];
}
