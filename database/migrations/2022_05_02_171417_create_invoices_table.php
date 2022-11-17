<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_number');
            $table->string('client')->nullable();
            $table->string('email')->nullable();
            $table->string('tax')->nullable();
            $table->string('client_address')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('invoice_date')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('total')->nullable();
            $table->string('tax_1')->nullable();
            $table->string('discount')->nullable();
            $table->string('grand_total')->nullable();
            $table->string('other_information')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('invoice_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
