<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppConfiguration extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'CONFIG_CODE';
    protected $table = 'tb_application_configuration';
    protected $fillable = [
        'CONFIG_CODE', 'CONFIG_NAME', 'CONFIG_PARAM', 'ENTRY_USER', 'ENTRY_DATE', 'UPDATE_USER', 'UPDATE_DATE',
    ];
}
