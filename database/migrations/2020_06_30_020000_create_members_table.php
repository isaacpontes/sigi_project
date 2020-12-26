<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('gender');
            $table->date('birth');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->date('admission');
            $table->date('demission')->nullable();
            $table->timestamps();

            $table->foreignId('classroom_id')->nullable()->constrained();
            $table->foreignId('congregation_id')->constrained();
            $table->foreignId('church_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
