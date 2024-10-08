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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150)->unique();
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 10, 2)->default(0.00);
            $table->string('tamaño')->default('familiar');
            $table->string('url_imagen');
            $table->boolean('is_active')->default(false);
            $table->string('categoria');
            $table->string('tipo_botella')->nullable();
            $table->decimal('stock', 10, 2)->default(0);
            $table->decimal('stock_minimo', 10, 2)->default(0);
            $table->decimal('stock_maximo', 10, 2)->default(0);
            $table->unsignedBigInteger('receta_id')->nullable();
            $table->foreign('receta_id')->references('id')->on('recetas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
