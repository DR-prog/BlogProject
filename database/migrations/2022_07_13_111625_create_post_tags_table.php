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
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('tag_id');
            $table->timestamps();

            $table->index('post_id', 'post_tag_post_idx');
            $table->index('tag_id', 'post_tag_tag_idx');
            $table->foreign('post_id', 'post_tag_post_fk')->on('post')->references('id');
            $table->foreign('tag_id', 'post_tag_tag_fk')->on('tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tags');
    }
};
