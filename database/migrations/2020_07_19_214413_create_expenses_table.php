<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('value');
            $table->date('ref_date');
            $table->text('add_info')->nullable();
            $table->timestamps();

            $table->foreignId('expense_category_id')->constrained()->onDelete('restrict');
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
        Schema::dropIfExists('expenses');
    }
}
