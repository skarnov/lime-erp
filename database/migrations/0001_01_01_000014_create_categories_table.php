<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Migrations\AuditableMigration;

class CreateCategoriesTable extends AuditableMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fk_category_id')->nullable();
            $table->bigInteger('serial')->unsigned()->nullable();
            $table->string('name', 100);
            $table->string('url_slug', 100);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $this->addAuditColumns($table);
            $table->softDeletes();
            $table->foreign('fk_category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}