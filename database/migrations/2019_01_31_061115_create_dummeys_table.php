<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDummeysTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('dummeys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dummey_name');
            $table->integer('placement_id');
            $table->integer('bind_id');
            $table->integer('user_id');
            $table->double('daily_pv_tot');
            $table->string('side');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('dummeys');
    }

}
