<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('telefone_celular');
            $table->bigInteger('cpf_rg')->unique();
            $table->enum('estado_civil', ['Solteiro(a)', 'Casado(a)', 'Viúvo(a)']);
            $table->string('estado_naturalidade');
            $table->string('cidade_naturalidade');
            $table->date('data_nascimento');
            $table->string('observacao')->nullable();
            $table->enum('sexo', ['Masculino', 'Feminino']);
            $table->enum('tipo', ['Aluno', 'Funcionário', 'Dependente', 'Comunidade', 'Serviço Prestado']);
            $table->integer('cep');
            $table->string('estado');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('logradouro');
            $table->string('numero');
            $table->integer('matricula')->nullable();
            $table->enum('curso_setor', ['ADMINISTRAÇÃO',
             'ARQUITETURA E URBANISMO',
             'AGRONOMIA',
             'CIÊNCIAS BIOLÓGICAS',
             'CIÊNCIAS SOCIAIS',
             'CIÊNCIAS - HABILITAÇÃO EM BIOLOGIA',
             'CIÊNCIAS - HABILITAÇÃO EM FÍSICA',
             'CIÊNCIAS - HABILITAÇÃO EM MATEMÁTICA',
             'CIÊNCIAS - HABILITAÇÃO EM QUÍMICA',
             'DIREITO',
             'ENGENHARIA CIVIL',
             'ENGENHARIA DE PESCA',
             'ENGENHARIA DA COMPUTAÇÃO',
             'ENGENHARIA DA PRODUÇÃO',
             'ENGENHARIA MECÂNICA',
             'FORMAÇÃO DE OFICIAIS - POLÍCIA MILITAR',
             'FORMAÇÃO DE OFICIAIS - BOMBEIRO MILITAR',
             'FILOSOFIA',
             'FÍSICA',
             'GEOGRAFIA',
             'HISTÓRIA',
             'LETRAS',
             'MATEMÁTICA',
             'MEDICINA VETERINÁRIA',
             'MÚSICA',
             'PEDAGOGIA',
             'QUÍMICA',
             'ZOOTECNIA',
             'BIBLIOTECA',
             'NTI',
             'PROEXAE',
             'PROPLAN', 
             'PROG',
             'PPG',
             'PROTOCOLO',
             'POSTO MÉDICO',
             'PREFEITURA',
             'REITORIA'])->nullable();

            $table->boolean('ativo')->default(true);
            $table->integer('versao')->default(1);
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
