<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',100);
            $table->rememberToken();

            $table->string('avatar',255)->nullable();
            $table->tinyInteger('level');
            $table->text('description')->nullable();

            $table->string('company_name',100)->nullable();
            $table->string('country',100)->nullable();
            $table->string('street_address',100)->nullable();
            $table->string('postcode_zip',10)->nullable();
            $table->string('town_city',30)->nullable();
            $table->string('phone',15)->nullable();

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
        Schema::dropIfExists('users');
    }
}
