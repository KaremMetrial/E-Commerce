<?php

    use App\Enums\OrderStatus;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->string('user_name');
                $table->string('user_phone');
                $table->string('user_email');
                $table->decimal('price', 10, 2);
                $table->decimal('shipping_price', 10, 2);
                $table->decimal('total_price', 10, 2);
                $table->text('note');
                $table->string('status')->default(OrderStatus::PENDING->value);
                $table->string('country');
                $table->string('governorate');
                $table->string('city');
                $table->string('street');
                $table->timestamps();

                $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

                $table->index(['user_id', 'status']);
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('orders');
        }
    };
