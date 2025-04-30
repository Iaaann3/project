<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $fillable = ['deskripsi', 'jumlah', 'id_dana'];

    public function dana()
    {
        return $this->belongsTo(Dana::class, 'id_dana');
    }
}
