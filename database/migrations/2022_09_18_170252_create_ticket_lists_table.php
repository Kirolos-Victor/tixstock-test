<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_lists', function (Blueprint $table) {
            $table->id();
            $table->string('event_name', 50);
            $table->enum('currency', ['GBP', 'USD', 'EUR']);
            $table->integer('quantity_initial');
            $table->integer('quantity_available');
            $table->timestamp('date_added')->default(\Carbon\Carbon::now());
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('ticket_lists');
    }
};
