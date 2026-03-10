<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $guarded = ['id']; 

    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }

    public static function tipos(){
        return [
            'Nacional',
            'Internacional'
        ];
    }

    public function setPrecoAttribute($preco){
        $this->attributes['preco'] = str_replace(',','.',$preco);
    }

    public function getPrecoAttribute($preco){
        return number_format($preco, 2, ',', '');
    }
}
