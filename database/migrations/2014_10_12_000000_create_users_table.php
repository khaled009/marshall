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
            $table->increments('id');
            $table->enum('type',['user','coach','agent']);
            $table->string('name');
            $table->string('mobile')->nullable();
            $table->string('email')->unique();
            $table->integer('age')->nullable();
            $table->double('height')->nullable();
            $table->double('weight')->nullable();
            $table->text('image')->nullable()->default('public/admin_logo_default.jpg');
            $table->enum('gender',['male','female'])->default('male');
            $table->string('position')->default('');
            $table->string('latitude')->default('');
            $table->string('longitude')->default('');
            $table->enum('foot',['right','left','both'])->default('right');
            $table->string('code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('identify_image')->default('');
            $table->string('club_image')->default('');
            $table->string('trainee_image')->default('');
            $table->string('reset_code')->nullable();
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
