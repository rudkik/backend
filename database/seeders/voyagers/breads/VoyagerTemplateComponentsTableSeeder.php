<?php

namespace Database\Seeders\voyagers\breads;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class VoyagerTemplateComponentsTableSeeder extends Seeder
{
    private const TABLE_NAME = 'voyager_template_components';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataType = DataType::create([
            'slug' => self::TABLE_NAME,
            'name' => self::TABLE_NAME,
            'display_name_singular' => 'Компоненты',
            'display_name_plural' => 'Компоненты',
            'icon' => 'voyager-tools',
            'model_name' => 'App\\Models\\VoyagerTemplateComponents',
            'controller' => '',
            'generate_permissions' => 1,
            'server_side' => 1,
            'description' => '',
            'details' => [
                'order_column' => 'position',
                'order_direction' => 'ASC',
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'id',
            'type' => 'number',
            'display_name' => 'Id',
            'required' => 1,
            'browse' => 1,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'text',
            'type' => 'text',
            'display_name' => 'Text',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'color',
            'type' => 'color',
            'display_name' => 'Color',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'number',
            'type' => 'number',
            'display_name' => 'Number',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'password',
            'type' => 'password',
            'display_name' => 'password',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'select_dropdown',
            'type' => 'select_dropdown',
            'display_name' => 'Select Dropdown (Данные не из таблицы, а из конфиг файла)',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'options' => [
                    'one' => 'One',
                    'two' => 'Two',
                    'three' => 'Three'
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'select_multiple',
            'type' => 'select_multiple',
            'display_name' => 'Select Multiple (Данные не из таблицы, а из конфиг файла)',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'options' => [
                    'one' => 'One',
                    'two' => 'Two',
                    'three' => 'Three'
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'relationship',
            'type' => 'number',
            'display_name' => 'Relationship',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'relationship_relationship',
            'type' => 'relationship',
            'display_name' => 'Relationship (Список стран)',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\LocationCountry',
                'table' => 'location_countries',
                'type' => 'belongsTo',
                'column' => 'relationship',
                'key' => 'id',
                'label' => 'title',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'ref_voyager_template_components_relationship',
            'type' => 'relationship',
            'display_name' => 'Ref Relationship (Many-To-Many) (Список тегов новостей)',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => [
                'model' => 'App\\Models\\HandbookNewsTag',
                'table' => 'handbook_news_tags',
                'type' => 'belongsToMany',
                'column' => 'id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'ref_voyager_template_components',
                'pivot' => '1',
                'taggable' => '0',
            ],
        ]);


        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'coordinates',
            'type' => 'coordinates',
            'display_name' => 'Coordinates',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'position',
            'type' => 'position',
            'display_name' => 'Position',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'text_area',
            'type' => 'text_area',
            'display_name' => 'Text Area',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Редакторы',
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'rich_text_box',
            'type' => 'rich_text_box',
            'display_name' => 'Rich Text Box',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Редакторы',
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'code_editor',
            'type' => 'code_editor',
            'display_name' => 'Code Editor',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Редакторы',
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'markdown_editor',
            'type' => 'markdown_editor',
            'display_name' => 'Markdown Editor',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Редакторы',
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'file',
            'type' => 'file',
            'display_name' => 'File',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Файлы'
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'image',
            'type' => 'image',
            'display_name' => 'Image',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Файлы'
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'media_picker',
            'type' => 'media_picker',
            'display_name' => 'Media Picker',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Файлы'
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'multiple_images',
            'type' => 'multiple_images',
            'display_name' => 'Multiple Images',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Файлы'
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'file_with_chunk_uploads',
            'type' => 'file_with_chunk_uploads',
            'display_name' => 'File With Chunk Uploads',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Файлы',
                'options' => [
                    'resumable' => [
                        'maxFiles' => 3
                    ]
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'date',
            'type' => 'date',
            'display_name' => 'Date',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Даты и время'
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'time',
            'type' => 'time',
            'display_name' => 'Time',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Даты и время'
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'timestamp',
            'type' => 'timestamp',
            'display_name' => 'Timestamp',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Даты и время'
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'date_range',
            'type' => 'date_range',
            'display_name' => 'date_range',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Даты и время'
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'checkbox',
            'type' => 'checkbox',
            'display_name' => 'Checkbox',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Чекеры',
                'browse_inline_editor' => true,
                'on' => 'Активен',
                'off' => 'Не активен',
                'checked' => false
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'multiple_checkbox',
            'type' => 'multiple_checkbox',
            'display_name' => 'Multiple Checkbox',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Чекеры',
                'checked' => true,
                'options' => [
                    'bread' => 'Хлеб',
                    'milk' => 'Молоко'
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'radio_btn',
            'type' => 'radio_btn',
            'display_name' => 'Radio Btn',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'tab_title' => 'Чекеры',
                'default' => "radio1",
                'options' => [
                    'on' => 'Активен',
                    'off' => 'Не активен'
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Дата создания',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Дата обновления',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'adv_image',
            'type' => 'adv_image',
            'display_name' => 'Adv Image',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => [
                'tab_title' => 'ADV',
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'adv_media_files',
            'type' => 'adv_media_files',
            'display_name' => 'Adv Media Files',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => [
                'tab_title' => 'ADV',
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'adv_fields_group',
            'type' => 'adv_fields_group',
            'display_name' => 'Adv Fields Group',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => [
                'tab_title' => 'ADV',
                'fields' => [
                    'seo_title' => [
                        'label' => 'SEO Title',
                        'type' => 'text',
                    ],
                    'meta_description' => [
                        'label' => 'META Description',
                        'type' => 'text',
                    ],
                    'meta_keywords' => [
                        'label' => 'META Keywords',
                        'type' => 'text',
                    ]
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'adv_json',
            'type' => 'adv_json',
            'display_name' => 'Adv Json',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => [
                'tab_title' => 'ADV',
                'json_fields' => [
                    'group' => 'Группа',
                    'name' => 'Название',
                    'value' => 'Значение',
                ]
            ]
        ]);

        Permission::generate(self::TABLE_NAME);
    }
}
