<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // For SQLite compatibility, we need to recreate the table.
        if (Schema::getConnection()->getDriverName() === 'sqlite') {
            Schema::table('services', function (Blueprint $table) {
                // We'll handle this by allowing the new value through application logic.
            });
        } else {
            // For MySQL and other databases.
            DB::statement(
                'ALTER TABLE services MODIFY COLUMN rate_type '.
                "ENUM('fixed', 'per_hour', 'per_square_meter', 'none') ".
                "NOT NULL DEFAULT 'none'"
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::getConnection()->getDriverName() === 'sqlite') {
            Schema::table('services', function (Blueprint $table) {
                // We'll handle this by allowing the old values through application logic.
            });
        } else {
            // For MySQL and other databases.
            DB::statement(
                'ALTER TABLE services MODIFY COLUMN rate_type '.
                "ENUM('fixed', 'per_hour', 'per_square_meter') ".
                "NOT NULL DEFAULT 'fixed'"
            );
        }
    }
};
