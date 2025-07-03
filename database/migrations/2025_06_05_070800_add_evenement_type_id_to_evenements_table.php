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
        Schema::table('evenements', function (Blueprint $table) {
            $table->unsignedBigInteger('evenement_type_id')->nullable();
            $table->foreign('evenement_type_id')->references('id')->on('evenement_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('evenements', function (Blueprint $table) {
            $table->dropForeign(['evenement_type_id']);
            $table->dropColumn('evenement_type_id');
        });
    }
};
