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
        Schema::create('obrero_tarea', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('obrero_id');
            $table->unsignedBigInteger('tarea_id');


            $table->foreign('obrero_id')
                ->references('id')
                ->on('obreros')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tarea_id')
                ->references('id')
                ->on('tareas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                

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
        Schema::dropIfExists('obrero_tarea');
    }
};


