<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticosTable extends Migration
{
    public function up()
    {
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id')->constrained('alunos')->onDelete('cascade');
            $table->string('diagnostico')->nullable();
            $table->boolean('epilepsia')->default(false);
            $table->boolean('deficiencia_intelectual')->default(false);
            $table->boolean('alergia')->default(false);
            $table->string('outros')->nullable();
            $table->boolean('atendente_terapeutico')->default(false);
            $table->string('responsavel')->nullable();
            $table->string('email_responsavel')->nullable();
            $table->string('telefone_responsavel')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('diagnosticos');
    }
}
