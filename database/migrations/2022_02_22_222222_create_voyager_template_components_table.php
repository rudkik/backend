<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoyagerTemplateComponentsTable extends Migration
{
    private const TABLE_NAME = "voyager_template_components";

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string("text")->nullable();
            $table->text("text_area")->nullable();
            $table->text("rich_text_box")->nullable();
            $table->text("code_editor")->nullable();
            $table->text("markdown_editor")->nullable();
            $table->string("color")->nullable();
            $table->string("password")->nullable();
            $table->string("file")->nullable();
            $table->string("image")->nullable();
            $table->text("media_picker")->nullable();
            $table->text("multiple_images")->nullable();
            $table->text("file_with_chunk_uploads")->nullable();
            $table->integer("number")->nullable();
            $table->date("date")->nullable();
            $table->time("time")->nullable();
            $table->timestamp('timestamp')->nullable();
            $table->string('date_range')->nullable();
            $table->boolean('checkbox')->default(false);
            $table->string('multiple_checkbox')->nullable();
            $table->string('radio_btn')->nullable();
            $table->jsonb('coordinates')->nullable();
            $table->integer("position")->default(0);
            $table->string("select_dropdown")->nullable();
            $table->string("select_multiple")->nullable();
            $table->jsonb("adv_image")->nullable();
            $table->jsonb("adv_media_files")->nullable();
            $table->jsonb("adv_fields_group")->nullable();
            $table->jsonb("adv_json")->nullable();
            $table->foreignId('relationship')
                ->nullable()
                ->constrained('location_countries')
                ->cascadeOnDelete();
            $table->timestamps();

            // TODO: polymorphic adv_select_dropdown_tree adv_related adv_inline_set
        });

        Schema::create('ref_voyager_template_components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('handbook_news_tag_id')
                ->constrained('handbook_news_tags')
                ->cascadeOnDelete();
            $table->foreignId('voyager_template_components_id')
                ->constrained('voyager_template_components')
                ->cascadeOnDelete();
            $table->timestamps();
        });

//        Schema::create('ref_voyager_template_components_twos', function (Blueprint $table) {
//            $table->id();
//            $table->integer('handbook_news_tag_id');
//            $table->integer('ref_voyager_template_components_two_id');
//            $table->string('ref_voyager_template_components_two_type');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
