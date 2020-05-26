<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Comment;
class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comment',1000);
            $table->string('slug');
            $table->string('user');
            $table->string('user_image');
            $table->timestamps();
        });
        for($i=0;$i<100;$i++){
            Comment::create(array('comment'=>Str::random(20),'slug'=>1,'user'=>'mohamed','user_image'=>'mohamed.png'));

    }

    
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
        
    }
}
