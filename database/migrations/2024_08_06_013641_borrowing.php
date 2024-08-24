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
        Schema::create('borrowing_table', function (Blueprint $table) {
            $table->id();
            $table->date("borrowing_date");
            $table->date("returing_date");
            $table->foreignId("users_id")->constrained("users");
            $table->foreignId("item_id")->constrained("item_table");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowing_table');
    }
};
