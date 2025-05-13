<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->float('minutes');
            $table->foreignId('project_id')->constrained();
            $table->foreignId('user_id');
            $table->boolean('reported')->default(false);
            $table->timestamps();
            $table->index('project_id');
            $table->unique(['project_id', 'date', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peroids');
    }
};
