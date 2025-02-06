<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->decimal('total_price', 14, 2);
            $table->decimal('paid', 14, 2);
            $table->decimal('change', 14, 2);
            $table->foreignId('created_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('price', 14, 2);
            $table->foreignId('transaction_id')->nullable()->references('id')->on('transactions')->onDelete('cascade');
            $table->foreignId('created_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
