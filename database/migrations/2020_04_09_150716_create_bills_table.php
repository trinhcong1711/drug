<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('Tên hóa đơn');
            $table->string('code')->comment('Mã Hóa đơn');
            $table->integer('vat')->comment('Thuế giá trị gia tăng')->default(0);
            $table->integer('sale')->comment('Giảm giá')->default(0);
            $table->integer('total_money')->comment('Tổng tiền hóa đơn');
            $table->tinyInteger('payment_method')->comment('Phương thức thanh toán: 0 => Tiền mặt | 1 => Chuyển khoản')->default(0);
            $table->text('note')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 => Chưa thanh toán | 1 => Đã thanh toán');
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->timestamps();
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
