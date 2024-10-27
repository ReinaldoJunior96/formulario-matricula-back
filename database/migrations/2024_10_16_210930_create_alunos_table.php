<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('idade')->nullable();
            $table->enum('sexo', ['M', 'F']);
            $table->enum('tipo_cadastro', ['matricula', 'rematricula']);
            $table->string('serie_2025')->nullable();
            $table->enum('modalidade', ['vespertino', 'matutino', 'integral']);
            $table->string('nome_mae')->nullable();
            $table->string('responsavel_financeiro')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->boolean('possui_deficiencia')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
