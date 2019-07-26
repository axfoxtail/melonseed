<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->index();
            $table->string('business_name')->nullable();
            $table->string('category')->nullable();
            $table->string('activity_type')->nullable();
            $table->string('location')->nullable();
            $table->string('distance')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('website')->nullable();
            $table->string('age_range')->nullable();
            $table->text('activity_description')->nullable();
            $table->string('social_media_links')->nullable();
            $table->string('banner_img')->nullable();
            $table->string('thumbnail_img')->nullable();
            $table->string('profile_img')->nullable();
            $table->text('business_hours')->nullable();
            $table->string('permission')->default("0");
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('providers');
    }
}
