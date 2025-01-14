<?php namespace Dmrch\Content\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreateLpsTable extends Migration
{
    public function up()
    {
        Schema::create('dmrch_content_lps', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dmrch_content_lps');
    }
}
