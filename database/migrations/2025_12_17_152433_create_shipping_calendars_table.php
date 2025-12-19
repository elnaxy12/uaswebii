<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('shipping_calendars', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                  ->constrained('orders')
                  ->cascadeOnDelete();

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->string('title');

            $table->dateTime('shipped_at')->nullable();
            $table->date('estimated_arrival')->nullable();
            $table->dateTime('delivered_at')->nullable();

            $table->enum('status', ['shipped', 'delivered', 'late'])
                  ->default('shipped');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipping_calendars');
    }
};
