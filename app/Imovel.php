<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $fillable = [
        "descricao", "logradouroEndereco", "bairroEndereco", "numeroEndereco", "cepEndereco",
        "cidadeEndereco", "preco", "qtdQuartos", "tipo", "finalidade"
    ];

    // precisa ser declarado pois o eloquent vai procurar a tabela de nome "imovels"
    protected $table = "imoveis";
}
