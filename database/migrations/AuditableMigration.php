<?php

namespace App\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

abstract class AuditableMigration extends Migration
{
    /**
     * Add audit columns to a table.
     *
     * @param Blueprint $table
     * @return void
     */
    protected function addAuditColumns(Blueprint $table)
    {
        $table->timestamps();
        $table->unsignedBigInteger('created_by')->nullable();
        $table->unsignedBigInteger('updated_by')->nullable();
    }
}