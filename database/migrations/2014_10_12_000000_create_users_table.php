<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('emergency_phone_number');
            $table->string('resident');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code')->nullable();
            $table->string('village');
            $table->string('d_o_b');
            $table->string('birth_place');
            $table->string('student')->default('no');
            $table->string('license_number');
            $table->string('released_on');
            $table->string('release_test_deadline');
            $table->string('minimum_activity_deadline')->nullable();
            $table->string('insurance_company');
            $table->string('insurance_expiration');
            $table->string('medical_examination_deadline');
            $table->string('own_material')->default('no');
            $table->string('repayment_expiry_date')->nullable();
            $table->string('degree_of_contact')->nullable();
            $table->string('user_image')->nullable();
            $table->string('send_auto_email')->nullable();
            $table->string('release_test_deadline_status')->nullable();
            $table->string('minimum_activity_deadline_status')->nullable();
            $table->string('expiry_date_status')->nullable();
            $table->string('insurance_expiration_status')->nullable();
            $table->string('medical_examination_deadline_status')->nullable();

            //new fields add
            $table->string('qualification')->default('no');
            $table->string('dl')->default('no');
            $table->string('ip')->default('no');
            $table->string('ip_tandem')->default('no');
            $table->string('ip_aff')->default('no');
            $table->string('ips')->default('no');
            $table->string('ipe')->default('no');
            $table->string('dl_releaseDate')->nullable();
            $table->string('ip_expiryDate')->nullable();
            $table->string('tandem_release_date')->nullable();
            $table->string('ip_aff_release_date')->nullable();
            $table->string('ips_release_date')->nullable();
            $table->string('ipe_release_date')->nullable();


//            0 admin 1 users
            $table->integer('role')->default(1);
//            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
