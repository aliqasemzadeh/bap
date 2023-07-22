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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->string('status')->index()->default('draft');
            $table->bigInteger('wallet_id')->index();
            $table->bigInteger('user_id')->index();
            $table->string('symbol')->index();
            $table->string('network')->index();
            $table->string('address')->index();
            $table->string('txid')->index()->nullable();
            $table->string('memo')->index()->nullable();
            $table->double('rate')->default(0);
            $table->double('amount')->default(0);
            $table->longText('options')->nullable();
            $table->timestamps();
            $table->expirable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
