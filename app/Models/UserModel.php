<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user'; //mendefnisikan nama tabel yang digunakan model
    protected $primaryKey = 'user_id'; //mendefinisikan primary key dari tabel

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['level_id', 'username', 'nama', 'password'];
}
