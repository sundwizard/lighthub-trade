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
        Schema::create('trade_histories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->uuid('account_id')->nullable();
            $table->foreign('account_id')->references('id')->on('trade_accounts')->onDelete('cascade');


            $table->date('starting_time');
            $table->string('starting_wallet_ballance');
            $table->string('starting_cash_ballance');
            $table->string('starting_exchange_rate');

            $table->date('closing_time')->nullable();
            $table->string('closing_wallet_ballance')->nullable();
            $table->string('closing_cash_ballance')->nullable();
            $table->string('closing_exchange_rate')->nullable();
            $table->enum('status',['Active','Closed']);
            $table->string('profit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_histories');
    }
};
