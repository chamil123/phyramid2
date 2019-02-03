<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempDummeyPvsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('temp_dummey_pvs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dummey_id');
            $table->integer('product_id');
            $table->string('pv_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('temp_dummey_pvs');
    }

}
