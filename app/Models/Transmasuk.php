<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transmasuk extends Model
{
    use HasFactory;

    protected $fillable=[
        'katmasuk_id',
        'nama',
        'jumlah',
        'tanggal'
    ];

    public function katmasuk()
    {
        return $this->belongsTo(Katmasuk::class);
    }
}
