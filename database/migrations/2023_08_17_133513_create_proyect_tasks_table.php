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
        Schema::disableForeignKeyConstraints();

        Schema::create('proyect_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyect_member_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('task_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('role_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('priority_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('due_date');
            $table->foreignId('type_state_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyect_tasks');
    }
};
