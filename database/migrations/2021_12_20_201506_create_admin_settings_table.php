<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable()->unique();
            $table->string('slogan')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('term_condition')->nullable();
            $table->text('faqs')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('location')->nullable();
            $table->text('about_us')->nullable();
            $table->string('website_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('google_plus_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('address')->nullable();
            $table->string('upazila')->nullable();
            $table->string('district')->nullable();
            $table->string('division')->nullable();
            $table->json('rules')->nullable();
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
        Schema::dropIfExists('admin_settings');
    }
}
