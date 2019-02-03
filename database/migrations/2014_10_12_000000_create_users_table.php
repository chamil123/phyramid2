<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_nic')->unique();
            $table->string('name');
            $table->string('user_address');
            $table->string('user_gender');
            $table->string('user_dob');
            $table->string('user_contact_1');
            $table->string('user_contact_2');

            $table->string('user_bank_name');
            $table->string('user_bank_branch');
            $table->string('user_account_no');
            $table->string('user_benifit_name');
            $table->string('user_benifit_address');

            $table->string('user_pv')->default('');
            $table->string('user_status');
            $table->string('image');
           
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
