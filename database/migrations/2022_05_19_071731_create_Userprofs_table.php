<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Userprofs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('mail_address', 128);
            $table->string('phone', 13);
            $table->string('github_url', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Userprofs');
    }
};
