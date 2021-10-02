<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersAdm extends Model
{
    use HasFactory;
    protected $connection = 'mysql_2';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'users';
    protected $fillable = [
        'id_siswa', 'name', 'email', 'password', 'profile', 'address', 'dob', 'phone', 'is_active', 'id_siswa',
    ];
}
