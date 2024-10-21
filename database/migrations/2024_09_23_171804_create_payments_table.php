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
        Schema::create('payment_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status')->default('active');
            $table->timestamps();
        });

        // sumbangan, wakaf, project, kutipan
        Schema::create('payment_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status')->default('active');
            $table->timestamps();
        });

        // sumbangan, wakaf, project, kutipan
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // organizer
            $table->decimal('target_amount', 10, 2);
            
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('slug')->unique();

            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('payment_type_id')->nullable()->constrained('payment_types')->nullOnDelete();
            $table->string('name');
            $table->string('amount');
            $table->string('reference_number')->unique();
            $table->timestamps();
        });

        Schema::create('user_payment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('reference_number')->unique();
            $table->string('card_number')->nullable();
            $table->string('card_user')->nullable();
            $table->date('card_expiry')->nullable();
            $table->string('card_cvv')->nullable();
            
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();

            $table->string('phone_number')->nullable();
            
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('amount', 10, 2);
            $table->string('reference_number')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('payment_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_payment_id')->nullable()->constrained('user_payment')->nullOnDelete();
            $table->foreignId('payment_type_id')->constrained()->onDelete('cascade');

            // kalau jenis bayaran sumbangan
            $table->string('reason')->nullable();
            $table->foreignId('project_id')->nullable()->constrained()->nullOnDelete();

            $table->foreignId('payment_status_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('user_payment');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('payment_methods');
        Schema::dropIfExists('payment_types');
        Schema::dropIfExists('payment_statuses');
    }
};
