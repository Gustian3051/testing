<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;

    protected $table = 'satuans';

    protected $fillable = [
        'satuan',

    ];

    public function alatbahan()
    {
        return $this->hasMany(AlatBahan::class, 'satuan_id');
    }
}
