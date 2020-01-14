<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('designatable');
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')
                    ->references('id')->on('accounts')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('assigner_id');
            $table->foreign('assigner_id')
                    ->references('id')->on('people')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('assignee_id');
            $table->foreign('assignee_id')
                    ->references('id')->on('people')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('designates');
    }
}
