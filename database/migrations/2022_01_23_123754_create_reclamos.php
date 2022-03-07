<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        
        Schema::create('callers', function (Blueprint $table) {
            $table->id();
     
            $table->string('name');
            $table->string('lastname');
            $table->string('dni')->unique()->default(null);
            $table->string('mail');
            $table->string('phone');
            $table->string('location');
            
            $table->timestamps();
        });

        Schema::create('denunciados', function (Blueprint $table) {
            $table->id();

            $table->string('razonSocial');
            $table->string('objectService');
            $table->string('location');
            $table->string('department');
            $table->string('province');
        
            $table->timestamps();
        });

        Schema::create('tickets', function(Blueprint $table) {

            $date = new \DateTime();
            $date->setTimezone(new \DateTimeZone('+0800')); //GMT
            $fecha  = $date->format('Y-m-d H:i:s');
            // do a travel cross $fecha and delete the character afer 10 laps
            $fecha = substr($fecha, 0, 10);

            $table->id();

            $table->string('subject');
            $table->string('status')->default('Abierto');
            $table->string('priority');
            $table->string('sector');
            $table->string('comprobante');

            
            $table->unsignedBigInteger('creator_id')->unsigned();
            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('modifier_id')->unsigned();
            $table->foreign('modifier_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('caller_id')->unsigned();
            $table->foreign('caller_id')
                ->references('id')
                ->on('callers')
                ->onDelete('cascade');
            $table->unsignedBigInteger('target_id')->unsigned();
            $table->foreign('target_id')
                ->references('id')
                ->on('denunciados')
                ->onDelete('cascade');
            $table->date('creation_datetime')->default($fecha);
            $table->date('lastmodif_datetime')->default($fecha);
        });

        Schema::create('reclamos', function (Blueprint $table) {
            $date = new \DateTime();
            $date->setTimezone(new \DateTimeZone('+0800')); //GMT
            $fecha  = $date->format('Y-m-d H:i:s');
            // do a travel cross $fecha and delete the character afer 10 laps
            $fecha = substr($fecha, 0, 10);

            $table->id();
            
            $table->string('detail');
            
            $table->unsignedBigInteger('ticket_id')->unsigned();
            $table->foreign('ticket_id')
                ->references('id')
                ->on('tickets')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->date('creation_datetime')->default($fecha);
            $table->date('lastmodif_datetime')->default($fecha);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reclamos');
    }
}
