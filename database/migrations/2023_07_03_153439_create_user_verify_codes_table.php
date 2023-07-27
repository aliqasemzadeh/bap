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
        Schema::create('user_verify_codes', function (Blueprint $table) {
            $table->id();
            $table->string('status')->index()->default('unused');
            $table->bigInteger('user_id')->index();
            $table->string('type')->default('password')->index(); //password, withdraw, change, wallet
            $table->string('method')->default('email')->index(); //email, sms
            $table->string('ip')->nullable();
            $table->string('value')->nullable();
            $table->bigInteger('code')->nullable();
            $table->expirable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_verify_codes');
    }
};
