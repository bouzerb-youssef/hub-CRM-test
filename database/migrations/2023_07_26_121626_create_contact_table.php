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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->string('cle', 32);
            $table->unsignedBigInteger('organisation_id');
            $table->string('e_mail', 200);
            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->string('telephone_fixe', 255);
            $table->string('service', 255);
            $table->string('fonction', 255);

            // Foreign key relationship with organisations table
            $table->foreign('organisation_id')
                  ->references('id')
                  ->on('organisations')
                  ->onDelete('cascade');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
