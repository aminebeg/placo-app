<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('orders')->where('status', 'processing')->update(['status' => 'confirmed']);
        DB::table('orders')->where('status', 'shipped')->update(['status' => 'in_delivery']);
    }

    public function down(): void
    {
        DB::table('orders')->where('status', 'confirmed')->update(['status' => 'processing']);
        DB::table('orders')->where('status', 'in_delivery')->update(['status' => 'shipped']);
    }
};
