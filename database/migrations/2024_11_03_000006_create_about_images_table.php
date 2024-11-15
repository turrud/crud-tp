<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('about_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_number');
            $table->string('caption')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('about_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_images');
    }
};
