<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table): void {
            $table->id();
            $table->timestamps();
            $table->integer('customer_id');
            $table->string('address');
            $table->string('phone');
            $table->string('name');
            $table->string('note')->nullable();
            $table->timestamp('shipped_at');
            $table->string('province');
            $table->string('district');
            $table->string('message')->nullable();
            $table->string('paid_at')->nullable();
            $table->string('status')->default('pending');
            $table->integer('total')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
