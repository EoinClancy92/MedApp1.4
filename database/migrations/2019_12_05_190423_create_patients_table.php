<?php
# @Date:   2019-12-05T19:04:23+00:00
# @Last modified time: 2019-12-05T19:07:45+00:00



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreatePatientsTable extends Migration
{
    /**
     * Migration for creating the patients table
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->boolean('has_insurance');
            $table->string('insurance_company')->nullable();
            $table->string('policy_number')->unique()->nullable();
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
        Schema::dropIfExists('patients');
    }
}
