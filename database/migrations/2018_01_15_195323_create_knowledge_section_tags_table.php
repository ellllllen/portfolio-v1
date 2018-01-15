<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnowledgeSectionTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowledge_section_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('knowledge_tag_id');
            $table->unsignedInteger('knowledge_section_id');
            $table->timestamps();

            $table->foreign('knowledge_tag_id')->references('id')->on('knowledge_tags');
            $table->foreign('knowledge_section_id')->references('id')->on('knowledge_sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('knowledge_section_tags', function (Blueprint $table) {
            $table->dropForeign(['knowledge_tag_id']);
            $table->dropForeign(['knowledge_section_id']);
        });

        Schema::dropIfExists('knowledge_section_tags');
    }
}
