<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFolderModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folder_models', function (Blueprint $table) {
            $table->id();
            $table->string('title', 122);
            $table->unsignedBigInteger('cell_id');
            $table->foreign('cell_id')
                ->references('id')->on('cell_models')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('folder_models');
    }
}
