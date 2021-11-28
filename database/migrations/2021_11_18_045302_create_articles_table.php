<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('pre_title')->nullable();
            $table->foreignId('user_id')->index();
            $table->foreignId('category_id')->index();
            $table->text('description')->nullable();
            $table->longText('body')->nullable();
            $table->string('language')->default('en')->index();
            $table->boolean('public')->default(true);
            $table->bigInteger('likes')->default(0);
            $table->bigInteger('views')->default(0);
            $table->timestamp('publish_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
