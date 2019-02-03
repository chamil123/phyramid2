<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDummeyPvsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('dummey_pvs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orders_product_id');
            $table->integer('dummey_id');
            $table->string('pv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('dummey_pvs');
    }

}
