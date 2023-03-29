<?php

namespace Database\Seeders\voyagers\breads;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class ClassNameTableSeeder extends Seeder
{
    private const TABLE_NAME = 'class_names';

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
            'display_name_singular' => 'Название классов',
            'display_name_plural' => 'Название классов',
            'icon' => 'voyager-pen',
            'model_name' => 'App\\Models\\ClassName',
            'controller' => '',
            'generate_permissions' => 1,
            'server_side' => 1,
            'description' => '',
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
            'add' => 0,
            'delete' => 0,
            'details' => [
                'validation' => [
                    'rule' => 'max:200',
                    'messages' => [
                        'max' => 'Максимум 200 символов'
                    ]
                ],
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

        Permission::firstOrCreate(['key' => 'browse_' . self::TABLE_NAME, 'table_name' => self::TABLE_NAME]);
        Permission::firstOrCreate(['key' => 'read_' . self::TABLE_NAME, 'table_name' => self::TABLE_NAME]);
        Permission::firstOrCreate(['key' => 'edit_' . self::TABLE_NAME, 'table_name' => self::TABLE_NAME]);
    }
}
