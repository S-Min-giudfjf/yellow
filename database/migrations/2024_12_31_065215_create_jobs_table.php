<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id'); // idを自動インクリメントとして設定
            $table->text('info'); // info カラム
            $table->text('detail'); // detail カラム
            $table->text('jobTitle'); // jobTitle カラム
            $table->char('jobKinds', 200); // jobKinds カラム
            $table->char('jobLand', 200); // jobLand カラム
            $table->integer('income'); // income カラム
            $table->timestamps(); // created_at と updated_at カラム
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
