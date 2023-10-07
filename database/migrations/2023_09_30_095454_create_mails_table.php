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
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->nullable(false);
            $table->string("name", 30)->nullable(false);
            $table->string("to")->nullable(true);
            $table->string("cc")->nullable(true);
            $table->string("bcc")->nullable(true);
            $table->string("subject")->nullable(true);
            $table->string("letter_body")->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};
