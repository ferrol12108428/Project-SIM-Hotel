<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\Cast\String_;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('room_id');
            $table->bigInteger('customer_id');
            $table->datetime('arrival_date');
            $table->dateTime('departure_date');
            $table->string('guests_count');
            $table->integer('night_stay');
            $table->decimal('total_price', 10, 2);
            $table->decimal('payment', 10, 2);
            $table->decimal('total_return', 10, 2);
            $table->enum('payment_status', ['Already paid', 'Not paid'])->default('Not paid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
