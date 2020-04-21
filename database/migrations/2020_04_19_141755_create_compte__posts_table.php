<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Compte_Post;

class CreateComptePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compte__posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('compte_post');
            $table->timestamps();
        });
        $data = array('compte_post'=>1);
        Compte_Post::create($data);
/* 
        DB::table('compte__posts')->insert(array('compte_post'=>1)); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compte__posts');
    }
}