<?php

namespace Database\Seeders\voyagers\breads;

use App\Constants\UserTypeConstant;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class UserTableSeeder extends Seeder
{
    private const TABLE_NAME = 'users';

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
            'display_name_singular' => 'Пользователь',
            'display_name_plural' => 'Пользователи',
            'icon' => 'voyager-person',
            'model_name' => 'App\\Models\\User',
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
            'field' => 'first_name',
            'type' => 'text',
            'display_name' => 'Имя',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'last_name',
            'type' => 'text',
            'display_name' => 'Фамилия',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_country_id',
            'type' => 'number',
            'display_name' => 'Страна',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_country_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Страна',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\HandbookCountry',
                'table' => 'handbook_countries',
                'type' => 'belongsTo',
                'column' => 'handbook_country_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_region_id',
            'type' => 'number',
            'display_name' => 'Область',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_region_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Область',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\HandbookRegion',
                'table' => 'handbook_regions',
                'type' => 'belongsTo',
                'column' => 'handbook_region_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_city_id',
            'type' => 'number',
            'display_name' => 'Населенный пункт',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_city_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Населенный пункт',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\HandbookCity',
                'table' => 'handbook_cities',
                'type' => 'belongsTo',
                'column' => 'handbook_city_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'user_type',
            'type' => 'select_dropdown',
            'display_name' => 'Тип пользователя',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'default' => UserTypeConstant::INDIVIDUAL,
                'options' => UserTypeConstant::LEGAL_TYPES
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_user_activity_id',
            'type' => 'number',
            'display_name' => '',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_user_activity_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Тип деятельности',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\HandbookUserActivity',
                'table' => 'handbook_user_activities',
                'type' => 'belongsTo',
                'column' => 'handbook_user_activity_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'own_elevator',
            'type' => 'checkbox',
            'display_name' => 'Наличие собственного элеватора',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'on' => 'Да',
                'off' => 'Нет',
                'checked' => true
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'phone_number',
            'type' => 'text',
            'display_name' => 'Номер телефона',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'regex:/^\+?[1-9][0-9]{7,14}$/|unique:users,phone',
                    'messages' => [
                        'regex' => 'Поле Номер телефона должна содержать цифры и +',
                        'unique' => 'Такой номер уже существует, попробуйте ввести другую'
                    ]
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'email',
            'type' => 'text',
            'display_name' => 'E-mail',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'email:rfc,dns|unique:users,email',
                    'messages' => [
                        'email' => 'Поле E-mail должно содержать username@domian.com',
                        'unique' => 'Такая почта уже существует, попробуйте создать другую'
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
            'browse' => 0,
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
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'settings',
            'type' => 'hidden',
            'display_name' => 'Настройки',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
        ]);

        Permission::generate(self::TABLE_NAME);
    }
}
