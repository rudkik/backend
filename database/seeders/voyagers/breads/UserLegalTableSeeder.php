<?php

namespace Database\Seeders\voyagers\breads;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Permission;

class UserLegalTableSeeder extends Seeder
{
    private const TABLE_NAME = 'user_legals';

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
            'display_name_singular' => 'Юр лицо',
            'display_name_plural' => 'Юр лица',
            'icon' => 'voyager-list',
            'model_name' => 'App\\Models\\UserLegal',
            'controller' => '',
            'generate_permissions' => 1,
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
            'field' => 'user_id',
            'type' => 'number',
            'display_name' => '',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
        ]);
        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'user_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Имя пользователя',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => [
                'model' => 'App\\Models\\User',
                'table' => 'users',
                'type' => 'belongsTo',
                'column' => 'user_id',
                'key' => 'id',
                'label' => 'first_name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
                'scope' => 'UserLegal'
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'bin',
            'type' => 'text',
            'display_name' => 'БИН',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'max:12|min:12|unique:user_legals,bin',
                    'messages' => [
                        'max' => 'Длина строки не должна превышать 12 символов',
                        'min' => 'Длина строки должна содержать 12 символов',
                        'unique' => 'Такой БИН уже существует, попробуйте создать другую'
                    ]
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'company',
            'type' => 'text',
            'display_name' => 'Компания',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'max:150|unique:user_legals,company',
                    'messages' => [
                        'max' => 'Длина строки не должна превышать 150 символов',
                        'unique' => 'Такая Компания уже существует, попробуйте создать другую'
                    ]
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'company_website',
            'type' => 'text',
            'display_name' => 'Сайт компании(ссылка)',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'unique:user_legals,company_website',
                    'messages' => [
                        'unique' => 'Такой Сайт компании уже существует, попробуйте создать другую'
                    ]
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'whatsapp',
            'type' => 'text',
            'display_name' => 'WhatsApp',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'unique:user_legals,whatsapp',
                    'messages' => [
                        'unique' => 'Такой WhatsApp уже существует, попробуйте создать другую'
                    ]
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'telegram',
            'type' => 'text',
            'display_name' => 'Telegram',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'unique:user_legals,telegram',
                    'messages' => [
                        'unique' => 'Такой Telegram уже существует, попробуйте создать другую'
                    ]
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'about_company',
            'type' => 'text',
            'display_name' => 'О компании',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'unique:user_legals,about_company',
                    'messages' => [
                        'unique' => 'Такое О компании уже существует, попробуйте создать другую'
                    ]
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_company_type_id',
            'type' => 'number',
            'display_name' => 'Тип компании',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_company_type_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Тип компании',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\HandbookCompanyType',
                'table' => 'handbook_company_types',
                'type' => 'belongsTo',
                'column' => 'handbook_company_type_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Дата создания',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 1,
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
            'field' => 'deleted_at',
            'type' => 'timestamp',
            'display_name' => 'Дата удаления',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
        ]);

        Permission::generateFor(self::TABLE_NAME);
    }
}
