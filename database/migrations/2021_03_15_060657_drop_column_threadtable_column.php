<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnThreadtableColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('threadtable', function (Blueprint $table) {
            $table->dropColumn('commentid');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('threadtable', function (Blueprint $table) {
            $table->boolean('commentid')->default(false);
          });
      
    }
}
