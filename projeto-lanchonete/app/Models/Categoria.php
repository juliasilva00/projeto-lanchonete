<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = ['categoria'];

    public function produto()
    {
        return $this->hasOne(Produto::class,'idCat');
    }
}
