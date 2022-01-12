<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Denunciante;

class CreateReclamo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamos', function (Blueprint $table) {
            $table->id();
            
            $table->string('name_denunciante');
            $table->string('apellido_denunciante');
            $table->string('dni_denunciante');
            $table->string('correo_denunciante');
            $table->string('telefono_denunciante');
            $table->string('direccion_denunciante');
            $table->string('razon_social');
            $table->string('objeto_denunciado');
            $table->string('direccion_denunciado');
            $table->string('departamento_denunciado');
            $table->string('provincia_denunciado');
            $table->string('asunto');
            $table->string('sector');
            $table->string('prioridad');
            $table->string('comprobante_reclamo');
            $table->string('motivo');
            $table->string('estado')->default('Abierto');
            
        
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('denunciantes', function (Blueprint $table) {
            $table->id();
            $table->string('name_denunciante');
            $table->string('apellido_denunciante');
            $table->string('dni_denunciante')->unique()->default(null);
            $table->string('correo_denunciante');
            $table->string('telefono_denunciante');
            $table->string('direccion_denunciante');
        
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('denunciados', function (Blueprint $table) {
            $table->id();
            $table->string('razon_social');
            $table->string('objeto_denunciado');
            $table->string('direccion_denunciado');
            $table->string('departamento_denunciado');
            $table->string('provincia_denunciado');
        
            $table->rememberToken();
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
        Schema::dropIfExists('reclamo');
    }
}
