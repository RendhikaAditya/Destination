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
        Schema::table('ratings', function (Blueprint $table) {
            $table->unsignedBigInteger('destination_id')->after('visitor_id');  // Place it below visitor_id
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');  // Define the foreign key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ratings', function (Blueprint $table) {
            $table->dropForeign('ratings_destination_id_foreign');  // Drop the foreign key constraint
            $table->dropColumn('destination_id');  // Remove the column
        });
    }
};
