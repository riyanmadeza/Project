<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'LOKASI_NAME';
    protected $table = 'tb_lokasi';
    protected $fillable = [
        "LOKASI_NAME", "ENTRY_USER", "ENTRY_DATE", "UPDATE_USER", "UPDATE_DATE",
    ];
}
