<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmtpEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smtp_emails', function (Blueprint $table) {
            $table->id();
            $table->string('mail_host', 100)->default('smtp.gmail.com');
            $table->string('mail_port', 10)->default('587');
            $table->string('mail_username', 100);
            $table->string('mail_password', 100);
            $table->string('mail_encryption', 20)->default('tls');
            $table->dateTime('start_send')->nullable();
            $table->dateTime('last_send')->nullable();
            $table->integer('number')->default(0);
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
        Schema::dropIfExists('smtp_emails');
    }
}
