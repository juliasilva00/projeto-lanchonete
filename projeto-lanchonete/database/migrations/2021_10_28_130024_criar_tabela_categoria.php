<?php

use App\Models\Categoria;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function(Blueprint $table) {
            $table->increments('id');
            $table->string('categoria');
        });

        $data = array(
            ['categoria' => 'Adicional'],
            ['categoria' => 'Bebida'],
            ['categoria' => 'Lanche']
        );
        foreach($data as $dataum) {
            $categoria = new Categoria();
            $categoria->categoria = $dataum['categoria'];
            $categoria->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categorias');
    }
}
