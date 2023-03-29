<?php

namespace Database\Seeders\voyagers\breads;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class ContactTableSeeder extends Seeder
{
    private const TABLE_NAME = 'contacts';

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
            'display_name_singular' => 'Контакт',
            'display_name_plural' => 'Контакты',
            'icon' => 'voyager-world',
            'model_name' => 'App\\Models\\Contact',
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
            'field' => 'email',
            'type' => 'text',
            'display_name' => 'Email',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'required|email:rfc,dns',
                    'messages' => [
                        'required' => 'Обязательно для заполнения',
                        'email' => 'Строка должен содержать @'
                    ]
                ]
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'instagram_link',
            'type' => 'text',
            'display_name' => 'Инстаграм',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'required',
                    'messages' => [
                        'required' => 'Обязательно для заполнения'
                    ]
                ]
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'telegram_link',
            'type' => 'text',
            'display_name' => 'Телеграм',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'required',
                    'messages' => [
                        'required' => 'Обязательно для заполнения'
                    ]
                ]
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'whatsapp_link',
            'type' => 'text',
            'display_name' => 'Ватсапп',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'required',
                    'messages' => [
                        'required' => 'Обязательно для заполнения'
                    ]
                ]
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'signature',
            'type' => 'text_area',
            'display_name' => 'Подпись',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
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
