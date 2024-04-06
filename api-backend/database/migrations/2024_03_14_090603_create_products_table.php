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
            $table->integer('store_id');
            $table->integer('category_id');
            $table->string('sku', 50);
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->double('price');
            $table->integer('discount')->nullable();
            $table->tinyInteger('discount_type')->default(1);
            $table->integer('type')->default(1);
            $table->integer('published');
            $table->integer('quantity');
            $table->text('description');
            $table->string('brand', 100)->nullable();
            $table->string('warranty', 50)->nullable();
            $table->string('warranty_type', 50)->nullable();
            $table->integer('city_id')->nullable();
            $table->boolean('special')->default(false);
            $table->text('draft')->nullable();
            $table->timestamps();
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
