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
        Schema::table('malls', function (Blueprint $table) {
            //$table->string('body')->after('name');  // بضيف كولم جديد
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('malls', function (Blueprint $table) {
            //$table->dropColumn('body'); // بمسح كولم
        });
    }
};
