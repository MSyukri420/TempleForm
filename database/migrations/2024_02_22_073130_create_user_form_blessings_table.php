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
        Schema::create('user_form_blessings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_form_id');
            $table->unsignedBigInteger('blessing_type_id');
            $table->text('answer')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_form_id')
                    ->references('id')->on('user_forms')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');

            $table->foreign('blessing_type_id')
                    ->references('id')->on('blessing_types')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_form_blessings');
    }
};
