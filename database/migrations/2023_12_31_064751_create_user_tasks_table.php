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
<<<<<<< HEAD:database/migrations/2023_12_31_064751_create_user_tasks_table.php
        Schema::create('user_task', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');   //参照先のテーブル名を
            $table->foreignId('task_id')->constrained('tasks');    //constrainedに記載
            $table->primary(['user_id', 'task_id']);
=======
        Schema::create('user_tasks', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('task_id')->consttained()->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
>>>>>>> master:database/migrations/2023_12_21_000256_create_user_tasks_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_tasks');
    }
};
