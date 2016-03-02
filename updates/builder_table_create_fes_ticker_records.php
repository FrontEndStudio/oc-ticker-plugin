<?php namespace Fes\Ticker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class builder_table_create_fes_ticker_records extends Migration
{
    public function up()
    {
        Schema::create('fes_ticker_records', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('title')->nullable();
            $table->text('content')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('sort_order');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fes_ticker_records');
    }
}
