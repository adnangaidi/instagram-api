<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compteMedia extends Model
{
    use HasFactory;
    protected $table='compte_media';
    protected $primaryKey='id';
    protected $fillable = [
        'access_token',
        'type_compte',
        'image_path',
    ];
}
