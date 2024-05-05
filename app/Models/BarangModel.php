<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PhpParser\Node\Attribute;
use Tymon\JWTAuth\Contracts\JWTSubject;

class barangModel extends Model
{
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';
    protected $fillable = [
        'kategori_id',
        'barang_kode',
        'barang_nama',
        'harga_beli',
        'harga_jual',
        'image'
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(kategoriModel::class, 'kategori_id', 'kategori_id');
    }

    

}
