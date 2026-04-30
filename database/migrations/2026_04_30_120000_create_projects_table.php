<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('stack');
            $table->text('description');
            $table->string('image_url')->nullable();
            $table->string('primary_link_label')->nullable();
            $table->string('primary_link_url')->nullable();
            $table->string('secondary_link_label')->nullable();
            $table->string('secondary_link_url')->nullable();
            $table->integer('sort_order')->default(0)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
