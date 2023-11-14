<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnMessageToImportEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('import_emails', function (Blueprint $table) {
            $table->string('message')->nullable();
            $table->integer('retry')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('import_emails', function (Blueprint $table) {
            $table->dropColumn('message');
            $table->dropColumn('retry');
        });
    }
}
