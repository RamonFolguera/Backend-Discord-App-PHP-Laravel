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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->foreign('player_id')
            ->references('id')
            ->on('players')
            ->onUpdate('cascade')
            ->onDelete('cascade');
      

        $table->unsignedBigInteger('party_id');
        $table->foreign('party_id')
            ->references('id')
            ->on('parties')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            
           
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
        //
    }
};
