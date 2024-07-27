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
        Schema::create('incoming_letters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipent_id')->constrained('members')->onDelete('cascade');
            $table->string('number_letter');
            $table->date('date_letter');
            $table->string('from');
            $table->enum('type', ['urgent', 'regular', 'medium']);
            $table->string('softfile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_letters');
    }
};
