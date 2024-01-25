<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->date('date');
            $table->integer('stock');
            $table->time('time');
            $table->string('location');
            $table->string('venue');
            $table->integer('price');
            $table->enum('status',['active','inactive']); // e.g., 'active', 'inactive'
            $table->foreignId('category_id')->constrained(); // Assuming you have foreign key constraint
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
        Schema::dropIfExists('events');
    }
}
