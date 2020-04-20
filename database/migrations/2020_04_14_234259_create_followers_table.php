<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Follower;

class CreateFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_follow');
            $table->integer('follow');
            $table->string('slug_follow');
            $table->string('slug_plus_user');
            $table->timestamps();
        });
        $data = array('user_follow'=>'polat' ,'follow'=>1,'slug_follow'=>2,'slug_plus_user'=>'polat2');
        Follower::create($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followers');
    }
}
