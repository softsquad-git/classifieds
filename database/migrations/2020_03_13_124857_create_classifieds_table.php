<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassifiedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classifieds', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->integer('category_id')->index();
            $table->string('title');
            $table->text('content');
            $table->string('contact_person');
            $table->string('email');
            $table->string('type');
            $table->decimal('starting_price')->nullable();
            $table->decimal('price')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->string('number_phone')->nullable();
            $table->boolean('is_negotiation')->default(0);
            $table->boolean('is_reservation')->default(0);
            $table->string('state');
            $table->integer('views')->default(0);
            $table->string('status');
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
        Schema::dropIfExists('classifieds');
    }
}
