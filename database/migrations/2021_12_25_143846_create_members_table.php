<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('password');
            $table->enum('partner_type', ['lawyer', 'consultant'])->default('lawyer');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->timestamp('dob')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
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
        Schema::dropIfExists('members');
    }
}
