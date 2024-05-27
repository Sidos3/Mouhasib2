<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('total_immobilisee', 15, 2);
            $table->text('details_immobilisee');
            $table->decimal('total_circulants', 15, 2);
            $table->text('details_circulants');
            $table->decimal('capital_propre', 15, 2);
            $table->text('details_propre');
            $table->decimal('total_passifs', 15, 2);
            $table->text('details_passifs');
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
        Schema::dropIfExists('companies');
    }
}
