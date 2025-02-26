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
        Schema::create('leave_balances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // معرف الموظف (يرتبط مع جدول users)
            $table->foreignId('leave_type_id')->constrained()->onDelete('cascade');  // معرف نوع الإجازة (يرتبط مع جدول leave_types)
            $table->integer('leave_balance');  // رصيد الإجازات المتبقي
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_balances');
    }
};
