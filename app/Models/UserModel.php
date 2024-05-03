<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class userModel extends Authenticable implements JWTSubject
{
    use HasFactory;
    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }
    protected $table = 'm_user'; //to define the name of the table used
    protected $primaryKey = 'user_id'; //to define the primary key of the table used

//    protected $fillable = ['level_id', 'username', 'nama', 'password'];
    protected $fillable = ['level_id', 'username', 'nama', 'password','image'];

    public function level(): BelongsTo
    {
        return $this->belongsTo(levelModel::class, 'level_id', 'level_id');
    }
    protected function image(): Attribute{
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/' . $image),
        );
    }
}