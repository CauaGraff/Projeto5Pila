<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas_plano_contas', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->enum('tipo', ['A', 'S']); // Analítico ou sintético
            $table->string('agrupamento')->nullable();
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
        Schema::dropIfExists('contas_plano_contas');
    }
};
