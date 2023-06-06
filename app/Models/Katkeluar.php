<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katkeluar extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama'
    ];

    public function transkeluars()
    {
        return $this->hasMany(Transkeluar::class, 'katkeluars_id', 'id');
    }
}
