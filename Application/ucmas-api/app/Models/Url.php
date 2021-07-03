<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'URL_CODE';
    protected $table = 'tb_url';
    protected $fillable = [
        'URL_CODE', 'URL_PARAM', 'URL_BODY', 'METHOD', 'ENTRY_USER', 'ENTRY_DATE', 'UPDATE_USER', 'UPDATE_DATE',
    ];
}
