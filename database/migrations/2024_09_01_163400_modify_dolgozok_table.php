<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDolgozokTable extends Migration
{
    public function up(): void
    {
        Schema::table('dolgozok', function (Blueprint $table) {
            // Példa új oszlop hozzáadására
            $table->string('uj_oszlop')->nullable();

            // Példa meglévő oszlop módosítására
            // $table->integer('cipomeret')->change();
        });
    }

    public function down(): void
    {
        Schema::table('dolgozok', function (Blueprint $table) {
            // Töröld az új oszlopot, ha visszavonás szükséges
            $table->dropColumn('uj_oszlop');
        });
    }
}
