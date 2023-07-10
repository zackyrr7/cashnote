<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katkeluar extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'user_id'
    ];

    public function transkeluars()
    {
        return $this->hasMany(Transkeluar::class, 'katkeluars_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
