<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pet_reports', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('pet_name');
            $table->string('species');
            $table->string('breed')->nullable();
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->string('color');
            $table->text('special_mark')->nullable();

            $table->string('photo');

            $table->string('lost_location');
            $table->date('lost_date');

            $table->text('description');

            $table->string('contact_number');

            $table->enum('status', ['active', 'found'])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_reports');
    }
};