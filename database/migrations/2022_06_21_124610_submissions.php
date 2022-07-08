<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Submissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('cat_id');
            $table->integer('issue_id');
            $table->string('pages');
            $table->string('author');
            $table->longText('abstract');
            $table->longText('keywords');
            $table->longText('pdf_link');
            $table->string('startDate');
            $table->string('status');
            $table->timestamps();
            $table->integer('uploaded_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submissions');
    }
}
