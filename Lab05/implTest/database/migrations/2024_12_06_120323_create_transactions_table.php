<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //   - Име и презиме на вработениот кој ја извршил трансакцијата на шалтерот.
    //
    //   - Име и презиме на праќачот на средствата.
    //
    //   - Име и презиме на примачот на средствата.
    //
    //   - Трансакциска сметка на праќачот.
    //
    //   - Трансакциска сметка на примачот.
    //
    //   - Сумата што е испратена.
    //
    //   - Датум на креирање на трансакцијата.
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('employeeNameSurname');
            $table->string('senderNameSurname');
            $table->string('receiverNameSurname');
            $table->string('senderTransaction');
            $table->string('receiverTransaction');
            $table->string('price');
            $table->string('date');


            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('transactions');

    }
};
