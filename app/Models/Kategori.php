<?php

// app/Models/Kategori.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';

    protected $fillable = ['nama_kategori','deskripsi',];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_kategori');
    }
}
