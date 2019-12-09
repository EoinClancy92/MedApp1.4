<?php
# @Date:   2019-12-03T18:09:33+00:00
# @Last modified time: 2019-12-05T18:46:01+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date_started');
            $table->bigInteger('user_id')->unsigned();

            $table
             ->foreign('user_id')
             ->references('id')
             ->on('users')
             ->onUpdate('cascade')
             ->onDelete('cascade');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
