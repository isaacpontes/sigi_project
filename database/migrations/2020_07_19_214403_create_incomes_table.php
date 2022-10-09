<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('value');
            $table->date('ref_date');
            $table->text('add_info')->nullable();
            $table->timestamps();

            $table->foreignId('member_id')->nullable()->constrained();
            $table->foreignId('income_category_id')->constrained()->onDelete('restrict');
            $table->foreignId('account_id')->constrained()->onDelete('cascade');
            $table->foreignId('church_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
