<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integradors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cpf_cnpj")->unique()->nullable()->check("(cpf_cnpj >= 10000000000 AND cpf_cnpj <= 99999999999999)");
            $table->string("nome_integrador",50);
            $table->string("nome_dono", 30);
            $table->string("cidade",50);
            $table->string("estado", 30);
            $table->string("marca_paineis",50);
            $table->string("porte", 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('integradors');
    }
}
