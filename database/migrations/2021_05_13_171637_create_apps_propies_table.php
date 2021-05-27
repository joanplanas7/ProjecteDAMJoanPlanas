<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppsPropiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps_propies', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('descripcio', 400);
            $table->string('ruta', 100)->nullable();
            $table->string('urlFoto', 100)->nullable();
            $table->string('exclusiva', 10);
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
        Schema::dropIfExists('apps_propies');
    }
}
