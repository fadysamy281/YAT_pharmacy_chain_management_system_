<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('treatment_id')->constrained('treatment_info')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('supplier_id')->constrained('suppliers')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('store_id')->constrained('stores')->nullable();
            $table->foreignId('branch_id')->constrained('pharmacy_branches')->nullable();
            $table->integer('quantity');

            $table->dateTime('production_date',0);
            $table->dateTime('expiration_date',0);
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
        Schema::dropIfExists('treatments');
    }
}
