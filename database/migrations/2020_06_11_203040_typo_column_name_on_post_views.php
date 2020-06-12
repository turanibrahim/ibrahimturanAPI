<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TypoColumnNameOnPostViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_views', function (Blueprint $table) {
            $table->renameColumn('ip_adress', 'ip_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_views', function (Blueprint $table) {
            $table->renameColumn('ip_address', 'ip_adress');
        });
    }
}
