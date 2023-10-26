<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('domain', 255)->unique();
            $table->string('tenant_id');
            $table->string('company');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('phone');
            $table->boolean('active')->default(0);
            $table->string('password');

            
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
}
