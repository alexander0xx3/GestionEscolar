<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionProfessorTable extends Migration
{
    public function up()
{
    Schema::table('professors', function (Blueprint $table) {
        $table->unsignedBigInteger('commission_id')->nullable()->after('id'); 
        $table->foreign('commission_id')->references('id')->on('commissions')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('professors', function (Blueprint $table) {
        $table->dropForeign(['commission_id']);
        $table->dropColumn('commission_id');
    });
}
}

