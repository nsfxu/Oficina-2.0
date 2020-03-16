<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{

    /*    
    id, cliente, data e hora do orçamento, vendedor, descrição, valor orçado
    */

    protected $fillable = ['Cliente', 'DataOrcamento', 'Vendedor', 'Descricao', 'Valor'];
    public    $timestamps   = true;

}
