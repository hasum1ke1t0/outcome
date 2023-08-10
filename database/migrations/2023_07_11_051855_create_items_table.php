<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('course', 50);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('create_year');
            $table->string('image')->nullable;
            $table->string('body', 300)->nullable();
            $table->foreignId('user_id')->constrained();
            $table->boolean('show')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
