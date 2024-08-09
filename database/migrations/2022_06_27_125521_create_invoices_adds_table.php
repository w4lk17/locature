<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices_adds', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->string('item')->nullable();
            $table->string('description')->nullable();
            $table->string('unit_cost')->nullable();
            $table->string('qty')->nullable();
            $table->string('amount')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices_adds');
    }
}
