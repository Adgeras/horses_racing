<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('betters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('surname', 150);
            $table->decimal('bet', 7, 2);
            $table->unsignedBigInteger('horse_id');
            $table->timestamps();
            $table->foreign('horse_id')->references('id')->on('horses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('betters', function (Blueprint $table) {
            $table->dropUnique(['horse_id']);
            $table->dropForeign(['horse_id']);
        });
    }
}
