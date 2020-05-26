<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\langage;
class CreateLangagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('langages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lang');
            $table->timestamps();
        });
        $data = array('lang'=>'an');
        langage::create($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('langages');
    }
}
