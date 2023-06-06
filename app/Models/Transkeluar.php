<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transkeluar extends Model
{
    use HasFactory;

    protected $fillable=[
        'katkeluar_id',
        'nama',
        'jumlah',
        'tanggal'
    ];

    public function katkeluar()
    {
        return $this->belongsTo(KatKeluar::class);
    }
}
