<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dolgozo extends Model
{
    use HasFactory;
    protected $table = 'dolgozok';
    protected $fillable = [
        'nev',
        'pozicio',
        'vegzettseg',
        'szuletesi_ido',
        'fizetes',
        'mikor_kezdett',
        'cipomeret',
        'ruhameret',
        'tort_szam',
        'megjegyzes',
    ];
}
