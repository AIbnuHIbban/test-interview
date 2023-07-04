<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_code');
            $table->unsignedBigInteger('customers_id');
            $table->unsignedBigInteger('concerts_id');
            $table->enum('status', ['reserved', 'checked-in'])->default('reserved');
            $table->dateTime('check_in_at')->nullable();
            $table->unsignedBigInteger('ticket_types_id');
            $table->timestamps();

            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('concerts_id')->references('id')->on('concerts')->onDelete('cascade');
            $table->foreign('ticket_types_id')->references('id')->on('ticket_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
