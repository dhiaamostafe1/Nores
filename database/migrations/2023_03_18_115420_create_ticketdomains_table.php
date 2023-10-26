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
        Schema::create('ticketdomains', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('state')->default(0);
            $table->string('sender');
            $table->text('message');
            $table->integer('source');
            $table->boolean('main');
            $table->integer('Userid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticketdomains');
    }
};
