<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_emails', function (Blueprint $table) {
            $table->id();
            $table->string('path_file')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('email_template_id')->nullable()->index();
            $table->integer('number_faild')->default(0);
            $table->integer('number_success')->default(0);
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
        Schema::dropIfExists('import_emails');
    }
}
