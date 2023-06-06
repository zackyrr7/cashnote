<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katmasuk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama'
    ];

    public function transmasuks()
    {
        return $this->hasMany(Transmasuk::class, 'katmasuks_id', 'id');
    }


}
