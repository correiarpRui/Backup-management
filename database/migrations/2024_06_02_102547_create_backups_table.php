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
        Schema::create('backups', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('token')->unique();
            $table->timestamps();
            $table->string('name');
            $table->foreignId('client_id')->constrained();
            $table->string('description');
            $table->string('encryption');
            $table->string('passphrase');
            $table->timestamp('time');
            $table->integer('repeat');      
            $table->string('allowdDays');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backups');
    }
};
