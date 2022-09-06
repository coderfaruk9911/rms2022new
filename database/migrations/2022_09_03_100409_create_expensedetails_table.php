<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expensedetails', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable();
            $table->string('expense_id')->nullable();
            $table->string('quantity');
            $table->string('unit_price');
            $table->string('unit');
            $table->string('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expensedetails');
    }
}
