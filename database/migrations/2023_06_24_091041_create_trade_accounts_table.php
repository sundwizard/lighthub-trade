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
        Schema::create('trade_accounts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('account_name');
            $table->string('wallet_ballance');
            $table->string('cash_ballance');
            $table->string('exchange_rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_accounts');
    }
};
