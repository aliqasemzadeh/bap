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
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->string('status')->index()->default('Pending');
            $table->bigInteger('wallet_id')->index();
            $table->bigInteger('user_id')->index();
            $table->string('symbol')->index();
            $table->string('network')->index();
            $table->string('txid')->index()->nullable();
            $table->string('address')->index();
            $table->double('rate')->default(0);
            $table->double('amount')->default(0);
            $table->longText('options')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdraws');
    }
};
