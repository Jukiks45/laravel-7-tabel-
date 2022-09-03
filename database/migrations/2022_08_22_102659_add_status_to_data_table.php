<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('data_pembelis', function (Blueprint $table) {
            $table->string('status')->after('notelepon');
        });
    }


    public function down()
    {
        Schema::table('data_pembelis', function (Blueprint $table) {
            //
        });
    }
};
