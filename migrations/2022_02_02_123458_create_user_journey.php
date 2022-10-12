<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserJourney extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_journey', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('journey_activity_type_id')->index();
            $table->enum('status', ['completed', 'partial-complete', 'incomplete']);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('percentage')->nullable();
            $table->unique(['user_id', 'journey_activity_type_id']);
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
        Schema::dropIfExists('user_journey');
    }
}
