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
        Schema::create('license_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('license_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('license_category_id')->constrained()->onDelete('cascade');
            $table->string('license_renewal_year')->nullable();
            $table->string('company_name')->nullable();
            $table->string('applicant_name');
            $table->string('email');
            $table->string('number')->nullable();
            $table->string('license_number')->nullable();
            $table->string('reference_number')->nullable();
            $table->date('license_start_date')->nullable();
            $table->date('license_expiry_date')->nullable();
            $table->decimal('money_received', 10, 2)->nullable();
            $table->decimal('profit', 10, 2)->nullable();
            $table->text('other_message')->nullable();
            $table->string('license_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_data');
    }
};
