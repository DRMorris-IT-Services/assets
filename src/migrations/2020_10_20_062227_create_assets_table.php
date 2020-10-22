<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('asset_id');
            $table->string('asset_name')->nullable();
            $table->string('asset_model')->nullable();
            $table->string('asset_serial_no')->nullable();
            $table->string('asset_barcode')->nullable();
            $table->string('asset_tag_no')->nullable();
            $table->date('asset_purchase_date')->nullable();
            $table->date('asset_warranty_date')->nullable();
            $table->string('asset_assigned_to')->nullable();
            $table->string('asset_location')->nullable();
            $table->string('asset_software')->nullable();
            $table->string('asset_status')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
