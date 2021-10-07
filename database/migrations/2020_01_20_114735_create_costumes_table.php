<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('status_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->unsignedTinyInteger('condition');
            $table->text('measurements');
            $table->string('size',7);
            $table->string('material')->default('unknown');
            $table->boolean('damage')->default(0);
            $table->boolean('is_approved')->default(0);
            $table->boolean('request_status')->default(0);
            $table->boolean('is_delivered')->default(0);
            $table->unsignedInteger('price');
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
        Schema::dropIfExists('costumes');
    }
}
