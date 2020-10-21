<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assetscontrols', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('asset_admin')->nullable();
            $table->string('asset_view')->nullable();
            $table->string('asset_add')->nullable();
            $table->string('asset_edit')->nullable();
            $table->string('asset_del')->nullable();
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
        Schema::dropIfExists('assetscontrols');
    }
}
