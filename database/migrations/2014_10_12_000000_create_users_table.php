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
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('carrier_assigns', function(Blueprint $table){
            $table->timestamps();
        });

        Schema::table('carrier_posts', function(Blueprint $table){
            $table->timestamps();
        });

        Schema::table('carrier_ratings', function(Blueprint $table){
            $table->timestamps();
        });
        Schema::table('carrier_request_posts', function(Blueprint $table){
            $table->timestamps();
        });
        Schema::table('carrier_request_post_responses', function(Blueprint $table){
            $table->timestamps();
        });
        Schema::table('districts', function(Blueprint $table){
            $table->timestamps();
        });
        Schema::table('orders', function(Blueprint $table){
            $table->timestamps();
        });
        Schema::table('order_details', function(Blueprint $table){
            $table->timestamps();
        });
        Schema::table('post_offices', function(Blueprint $table){
            $table->timestamps();
        });
        Schema::table('sell_posts', function(Blueprint $table){
            $table->timestamps();
        });
        Schema::table('thanas', function(Blueprint $table){
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
