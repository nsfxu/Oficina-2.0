<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrcamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /*    
    id, cliente, data e hora do orçamento, vendedor, descrição, valor orçado
    */

    public function up()
    {
        Schema::create('orcamentos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('Cliente', 100);
            $table->dateTime('DataOrcamento');
            $table->string('Vendedor', 100);
            $table->text('Descricao')->nullable();
            $table->double('Valor');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orcamentos');
    }
}
