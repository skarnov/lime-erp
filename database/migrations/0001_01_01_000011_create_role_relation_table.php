<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Migrations\AuditableMigration;

class CreateRoleRelationTable extends AuditableMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_relation', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_admin_id')->unsigned();
            $table->foreign('fk_admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->unsignedBigInteger('fk_role_id');
            $table->foreign('fk_role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_relation');
    }
}