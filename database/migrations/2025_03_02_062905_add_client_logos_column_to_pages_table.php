<?php
// Create a new migration file (e.g., 2023_10_27_123456_add_client_logos_column_to_pages_table.php)
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientLogosColumnToPagesTable extends Migration
{
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->json('client_logos')->nullable(); // or $table->jsonb(...) for PostgreSQL
        });
    }

    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('client_logos');
        });
    }
}