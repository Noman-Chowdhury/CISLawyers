<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->enum('partner_type', ['lawyer', 'consultant'])->default('lawyer');
            $table->string('father_name');
            $table->string('mother_name');
            $table->timestamp('dob');
            $table->string('nid_number');
            $table->string('passport_number');
            $table->string('bank_name');
            $table->string('bank_account_number');
            $table->text('profile_image')->nullable();
            $table->text('passport_image')->nullable();
            $table->text('nid')->nullable();
            $table->text('academic_certificate')->nullable();
            $table->text('cv')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_seen_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('business_partners');
    }
}
