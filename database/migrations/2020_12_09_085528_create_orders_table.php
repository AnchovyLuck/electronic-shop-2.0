<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id'); //According the tutorial, this is nullable
            $table->string('first_name',15);
            $table->string('last_name',15);
            $table->string('company_name',100)->nullable();
            $table->string('country',100);
            $table->string('street_address',100);
            $table->string('postcode_zip',10);
            $table->string('town_city',30);
            $table->string('email',100);
            $table->string('phone',15);
            $table->string('payment_type',20);

            $table->integer("status");

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
        Schema::dropIfExists('orders');
    }
}
