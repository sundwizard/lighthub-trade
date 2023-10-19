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
            $table->uuid('id')->primary();

            $table->uuid('authorizer_id')->nullable();
            $table->foreign('authorizer_id')->references('id')->on('users')->onDelete('cascade');

            $table->uuid('account_id')->nullable();
            $table->foreign('account_id')->references('id')->on('trade_accounts')->onDelete('cascade');

            $table->string('currency');
            $table->string('amount');
            $table->string('purpose');
            $table->string('tran_type');
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
