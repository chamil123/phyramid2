<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDummeyBindsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('dummey_binds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nic_dummey_id');
            $table->string('side');
            $table->integer('partner_dummey_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('dummey_binds');
    }

}
