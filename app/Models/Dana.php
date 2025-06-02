<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dana extends Model
{
    use HasFactory;

    protected $fillable = ['nama_dana', 'saldo', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pemasukan()
    {
        return $this->hasMany(Pemasukan::class);
    }

    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class);
    }
    
}

