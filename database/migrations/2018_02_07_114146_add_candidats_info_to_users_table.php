<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCandidatsInfoToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add candidat informations
            $table->string('cin')->nullable();
            $table->string('tel')->nullable();
            $table->text('address')->nullable();
            $table->date('birthday')->nullable();
            $table->string('ecole')->nullable();
            $table->string('cv')->nullable();
            $table->string('level')->nullable();
            $table->string('ville')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('cin')->nullable();
            $table->string('tel')->nullable();
            $table->text('address')->nullable();
            $table->date('birthday')->nullable();
            $table->string('ecole')->nullable();
            $table->string('cv')->nullable();
            $table->string('level')->nullable();
            $table->string('ville')->nullable();
        });
    }
}
