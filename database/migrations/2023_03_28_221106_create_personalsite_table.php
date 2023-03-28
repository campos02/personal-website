<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('albums', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('artist')->nullable();
            $table->string('album')->nullable();
        });

        Schema::create('artists', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('artist')->nullable();
            $table->string('category', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artists');

        Schema::dropIfExists('albums');
    }
};
