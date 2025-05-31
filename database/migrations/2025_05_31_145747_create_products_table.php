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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('small_description');
            $table->longText('description');
            $table->boolean('status')->default(true);
            $table->string('sku')->unique();
            $table->date('available_for')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2)->nullable();
            $table->date('start_discount')->nullable();
            $table->date('end_discount')->nullable();
            $table->boolean('manage_stock')->default(false);
            $table->integer('quantity');
            $table->integer('available_in_stock')->default(1);
            $table->integer('views');
            $table->timestamps();

            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();

            $table->index(['brand_id', 'category_id', 'name', 'sku', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
