<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // user_id and is_archived already exist.
        // No additional changes are needed.
    }

    public function down(): void
    {
        // Preserve the existing database columns.
    }
};