<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->text('comment');
            $table->string('task');
            $table->string('pdf');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
<<<<<<< HEAD:database/migrations/2023_12_31_061902_create_tasks_table.php
=======
            $table->string('comment',1000);
            $table->string('deadline',30);
            $table->string('pdf');
>>>>>>> master:database/migrations/2023_12_20_231254_create_tasks_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
