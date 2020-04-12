<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->integer('tel')->nullable();
            $table->integer('point')->default(0)->comment('Số điểm/tiền tích đc khi mua hàng');
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->tinyInteger('identity')->nullable()->comment('số chứng minh nhân dân');
            $table->tinyInteger('status')->default(1);
            $table->string('facebook')->nullable();
            $table->string('zalo')->nullable();
            $table->string('api_token')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
