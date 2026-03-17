<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Disable FK checks, truncate child then parent, re-enable
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('programs')->truncate();
        DB::table('program_categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // MySQL: alter ENUM column to new values for LPK Nakami
        DB::statement("ALTER TABLE program_categories MODIFY COLUMN type ENUM(
            'ginou-jisshusei',
            'tokutei-ginou',
            'engineering',
            'nihongo-gakkou'
        ) NOT NULL");
    }

    public function down(): void
    {
        DB::table('program_categories')->truncate();

        DB::statement("ALTER TABLE program_categories MODIFY COLUMN type ENUM(
            'reguler',
            'khusus'
        ) NOT NULL");
    }
};
