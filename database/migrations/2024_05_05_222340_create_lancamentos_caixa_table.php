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
        Schema::create('lancamentos_caixas', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->string('historico');
            $table->decimal('valor', 10, 2);
            $table->enum('tipo', ['C', 'D']); // Crédito ou débito
            $table->unsignedBigInteger('conta_id');
            $table->date('data_vencimento')->nullable();
            $table->date('data_baixa')->nullable();
            $table->decimal('juros', 10, 2)->default(0.00);
            $table->decimal('acrescimos', 10, 2)->default(0.00);
            $table->decimal('descontos', 10, 2)->default(0.00);
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
        Schema::dropIfExists('lancamentos_caixas');
    }
};
