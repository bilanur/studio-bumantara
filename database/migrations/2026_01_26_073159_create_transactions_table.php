<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number')->unique();
            $table->string('email');
            $table->string('phone');
            $table->string('customer_name');
            $table->string('package_name');
            $table->date('booking_date');
            $table->integer('total_payment');
            $table->string('drive_link')->nullable();
            $table->date('expiry_date')->nullable();
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};