<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->boolean('active')->default(true);
            $table->boolean('banned')->default(false);
            $table->boolean('notifable_email')->default(false);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('avatar')->nullable();
            $table->integer('votes')->unsigned()->nullable()->default(0);
            $table->string('steam_id', 255)->nullable();
            $table->string('facebook_id', 255)->nullable();
            $table->string('google_id', 255)->nullable();
            $table->text('geo')->nullable();
            $table->string('lang', 2)->nullable()->default('pl');
            $table->integer('votes')->unsigned()->nullable()->default(12);
            $table->unsignedInteger('ref')->nullable();
            $table->foreign('ref')->references('id')->on('comments')->onDelete("set null");
            $table->boolean('ref_status')->nullable()->default(false);
            $table->string('ref_code')->unique()->default('text');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
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
