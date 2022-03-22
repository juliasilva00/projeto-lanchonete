<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['descricao', 'preco','idCat'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'idCat');
    }
}
