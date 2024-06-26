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
        Schema::create('compliance_task', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->text('code_details');
            $table->text('discussion');
            $table->text('inspection_procedure');
            $table->text('primary_benefit');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compliance_task');
    }
};
