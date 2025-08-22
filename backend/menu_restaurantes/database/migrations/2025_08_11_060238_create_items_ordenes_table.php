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
        Schema::create('items_ordenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('ordenes'); // Pedido al que pertenece
            $table->foreignId('product_id')->constrained('productos'); // Producto específico
            $table->integer('quantity'); // Cantidad ordenada
            $table->decimal('unit_price', 8, 2); // Precio en el momento del pedido
            $table->decimal('subtotal', 10, 2); // Precio x cantidad
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_ordenes');
    }
};
