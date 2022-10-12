<?php

use App\Models\Journey\JourneyActivityType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourneyActivityTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journey_activity_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->tinyInteger('order');
            $table->boolean('published')->default(false);
            $table->enum('type', JourneyActivityType::TYPES);
            $table->unique('name');
            $table->softDeletes();
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
        Schema::dropIfExists('journey_activity_types');
    }
}
