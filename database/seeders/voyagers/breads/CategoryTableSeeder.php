<?php

namespace Database\Seeders\voyagers\breads;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class CategoryTableSeeder extends Seeder
{
    private const TABLE_NAME = 'categories';

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
            'display_name_singular' => 'Категория',
            'display_name_plural' => 'Категории',
            'icon' => 'voyager-pen',
            'model_name' => 'App\\Models\\Category',
            'controller' => '',
            'server_side' => 1,
            'generate_permissions' => 1,
            'description' => '',
            'details' => [
                'order_column' => 'id',
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
            'field' => 'title',
            'type' => 'text',
            'display_name' => 'Заголовок',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'parent_id',
            'type' => 'select_dropdown',
            'display_name' => 'Родная услуга',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'browse_tree' => true,
                'default' => '',
                'null'    => '',
                'options' => [
                    '' => '-- Не выбрано --',
                ],
                'relationship' => [
                    'key'   => 'id',
                    'label' => 'title',
                ],
            ]
        ]);


        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'links',
            'type' => 'adv_json',
            'display_name' => 'Ссылка(Youtube)',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                "json_fields" => [
                    "link" => "Youtube ссылка"
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'data',
            'type' => 'adv_json',
            'display_name' => 'Данные',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => [
                "json_fields" => [
                    "starts_at" => "Начало",
                    "ends_at" => "Окончание",
                    "is_active" => "Активное",
                ],
                "types" => [
                    "starts_at" => "datetime-local",
                    "ends_at" => "datetime-local",
                    "is_active" => "checkbox"
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'seo_info',
            'type' => 'adv_fields_group',
            'display_name' => 'Seo',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' =>  [
                "fields" => [
                    "seo_title" => [
                        "label" => "SEO Title",
                        "type" => "text"
                    ],
                    "meta_description" => [
                        "label" => "META Description",
                        "type" => "text"
                    ],
                    "meta_keywords" => [
                        "label" => "META Keywords",
                        "type" => "text"
                    ]
                ]
            ]
        ]);



        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Дата создания',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
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
            'browse' => 1,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
        ]);

        Permission::generate(self::TABLE_NAME);
    }
}
