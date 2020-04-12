<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code')->comment('Mã thuốc')->nullable()->unique();
            $table->string('composition')->comment('Thành phần')->nullable();
            $table->string('substances_active')->comment('Hoạt chất')->nullable();
            $table->string('production')->comment('Nước sản xuất')->nullable();
            $table->string('manufacturer')->comment('Nhà sản xuất')->nullable();
            $table->string('packing')->comment('Qui cách đóng gói')->nullable();
            $table->text('note')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('prescription_drug')->default(1);
            $table->integer('base_price')->default(0);
            $table->integer('final_price')->default(0);
            $table->integer('warning')->default(0);
            $table->date('date')->nullable();
            $table->date('exp')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('set null');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}
