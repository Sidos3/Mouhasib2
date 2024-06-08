<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bilans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // Admin Information
            $table->string('admin_name');
            $table->string('admin_email');
            $table->string('admin_phone');
            // Company Information
            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_registration');
            // Balance Sheet Information
            $table->double('total_immobilisation');
            $table->text('details_immobilisation');
            $table->double('total_actif_a_court_terme');
            $table->text('details_total_actif_a_court_terme');
            $table->double('total_du_capital');
            $table->text('details_du_capital');
            $table->double('total_du_passif_court_terme');
            $table->text('details_du_passif_court_terme');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bilans');
    }
};
