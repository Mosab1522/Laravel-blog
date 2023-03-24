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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete(); // = $table->unsignedBigInteger('post_id'); $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); //
            $table->text('body');
            $table->timestamps();

           // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
          // $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
