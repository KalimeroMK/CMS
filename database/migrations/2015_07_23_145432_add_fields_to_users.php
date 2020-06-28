<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('birthday');
            $table->string('avatar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('birthday');
            $table->dropColumn('bio');
            $table->dropColumn('gender');
            $table->dropColumn('mobile_no');
            $table->dropColumn('country');
            $table->dropColumn('timezone');
            $table->dropColumn('reset_password_code');
            $table->dropColumn('reset_requested_on');
            $table->dropColumn('activated');
            $table->dropColumn('activation_code');
            $table->dropColumn('activated_at');
        });
    }
}
