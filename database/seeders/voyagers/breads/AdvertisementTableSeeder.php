<?php

namespace Database\Seeders\voyagers\breads;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Permission;

class AdvertisementTableSeeder extends Seeder
{
    private const TABLE_NAME = 'advertisements';

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
            'display_name_singular' => 'Объявление',
            'display_name_plural' => 'Объявления',
            'icon' => 'voyager-list',
            'model_name' => 'App\\Models\\Advertisement',
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
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
        ]);


        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_city_id',
            'type' => 'select_dependent_dropdown',
            'display_name' => 'Выбор города',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => [
                'model' => 'App\\Models\\HandbookCountry',
                'name' => 'handbook_country_id',
                'route' => 'api.v1.dropdown',
                'display' => 'Страна',
                'placeholder' => 'Выберите страну',
                'key' => 'id',
                'label' => 'name',
                'dependent_dropdown' => [
                    [
                        'model' =>'App\\Models\\HandbookRegion',
                        'name' => 'handbook_region_id',
                        'display' => 'Область',
                        'placeholder' => 'Выберите область',
                        'key' => 'id',
                        'label' => 'name',
                        'where' => 'handbook_country_id',
                    ],
                    [
                        'model' =>'App\\Models\\HandbookCity',
                        'name' => 'handbook_city_id',
                        'display' => 'Город',
                        'placeholder' => 'Выберите город',
                        'key' => 'id',
                        'label' => 'name',
                        'where' => 'handbook_region_id'
                    ]
                ],
                'validation' => ['rule' => 'required|gt:0'],
            ],
        ]);
        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_city_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Город',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => [
                'model' => 'App\\Models\\HandbookCity',
                'table' => 'handbook_cities',
                'type' => 'belongsTo',
                'column' => 'handbook_city_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'handbook_cities',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_crop_id',
            'type' => 'select_dependent_dropdown',
            'display_name' => 'Выбор культур',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => [
                'model' => 'App\\Models\\HandbookCropCategory',
                'name' => 'handbook_crop_category_id',
                'route' => 'api.v1.dropdown',
                'display' => 'Категория культуры',
                'placeholder' => 'Выберите категорию культуры',
                'key' => 'id',
                'label' => 'name',
                'dependent_dropdown' => [
                    [
                        'model' =>'App\\Models\\HandbookCrop',
                        'name' => 'handbook_crop_id',
                        'display' => 'Культура',
                        'placeholder' => 'Выберите культуру',
                        'key' => 'id',
                        'label' => 'name',
                        'where' => 'handbook_crop_category_id'
                    ]
                ],
                'validation' => ['rule' => 'required|gt:0'],
            ],
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
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_advertisement_type_id',
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
            'field' => 'handbook_advertisement_type_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Тип объявления',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => [
                'model' => 'App\\Models\\HandbookAdvertisementType',
                'table' => 'handbook_advertisement_types',
                'type' => 'belongsTo',
                'column' => 'handbook_advertisement_type_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_advertisement_category_id',
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
            'field' => 'handbook_advertisement_category_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Категория объявления',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => [
                'model' => 'App\\Models\\HandbookAdvertisementCategory',
                'table' => 'handbook_advertisement_categories',
                'type' => 'belongsTo',
                'column' => 'handbook_advertisement_category_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_elevator_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Элеватор/База',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\HandbookElevator',
                'table' => 'handbook_elevators',
                'type' => 'belongsTo',
                'column' => 'handbook_elevator_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_crop_type_id',
            'type' => 'number',
            'display_name' => '',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
        ]);
        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_crop_type_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Тип культуры',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\HandbookCropType',
                'table' => 'handbook_crop_types',
                'type' => 'belongsTo',
                'column' => 'handbook_crop_type_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'shipment',
            'type' => 'text',
            'display_name' => 'Поставка',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'crop_year',
            'type' => 'number',
            'display_name' => 'Дата урожая(год)',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'min:4|max:4',
                    'messages' => [
                        'min' => 'Дата урожая(год) должен быть не менее 4 цифр',
                        'max' => 'Дата урожая(год) должен длиной не менее 4 цифр'
                    ],
                ],
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'moisture',
            'type' => 'number',
            'display_name' => 'Влажность в %',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'min' => 0,
                'max' => 100,
                'display' => [
                    'id' => 'moisture'
                ],
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'weed_impurity',
            'type' => 'number',
            'display_name' => 'Сорная примесь в %',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'min' => 0,
                'max' => 100,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_crop_color_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Цвет культуры',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\HandbookCropColor',
                'table' => 'handbook_crop_colors',
                'type' => 'belongsTo',
                'column' => 'handbook_crop_color_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'pest_infestation',
            'type' => 'number',
            'display_name' => 'Зараженность вредителями в %',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'min' => 0,
                'max' => 100,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'comment_infestation',
            'type' => 'text',
            'display_name' => 'Комментарий к зараженности',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'min_batch',
            'type' => 'number',
            'display_name' => 'Мин. Партия(тонн)',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);


        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'max_batch',
            'type' => 'number',
            'display_name' => 'Макс. Партия(тонн)',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'protein_mass',
            'type' => 'number',
            'display_name' => 'Массовая доля белка в %',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'min' => 0,
                'max' => 100,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'nature',
            'type' => 'number',
            'display_name' => 'Натура г/л',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'min' => 0,
                'max' => 100,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'grain_impurity',
            'type' => 'number',
            'display_name' => 'Зерновая примесь в %',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'min' => 0,
                'max' => 100,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'falls_number',
            'type' => 'number',
            'display_name' => 'Число падения(сек)',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'glassiness',
            'type' => 'number',
            'display_name' => 'Стекловидность в %',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'min' => 0,
                'max' => 100,
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'handbook_smell_id_relationship',
            'type' => 'relationship',
            'display_name' => 'Запах',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\HandbookSmell',
                'table' => 'handbook_smells',
                'type' => 'belongsTo',
                'column' => 'handbook_smell_id',
                'key' => 'id',
                'label' => 'name',
                'pivot_table' => 'migrations',
                'pivot' => '0',
                'taggable' => null,
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'idk',
            'type' => 'number',
            'display_name' => 'ИДК',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'gluten',
            'type' => 'number',
            'display_name' => 'Клейковина в %',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'advertisement_text',
            'type' => 'text',
            'display_name' => 'Текст объявления',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'validation' => [
                    'rule' => 'size:1000',
                    'messages' => [
                        'max' => 'Текст объявления должен длиной не менее 1000 символов'
                    ],
                ],
            ],
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'price',
            'type' => 'number',
            'display_name' => 'Цена за тонну',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'advertisement_hasmany_advertisement_file_relationshipp',
            'type' => 'relationship',
            'display_name' => 'Зерновая расписка ',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => [
                'model' => 'App\\Models\\AdvertisementFile',
                'table' => 'advertisement_files',
                'type' => 'hasMany',
                'column' => 'advertisement_id',
                'key' => 'id',
                'label' => 'path',
                'pivot_table' => 'migrations',
                'pivot' => 0,
                'taggable' => 0,
                'validation' => [
                    'rule' => 'mimes:pdf,jpg,png,jpeg|max:51200',
                    'messages' => [
                        'mimes' => 'Загрузите файл в формате pdf,jpg,png,jpeg',
                        'max'
                    ]
                ]
            ]
        ]);

        DataRow::create([
            'data_type_id' => $dataType->id,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Дата создания',
            'required' => 1,
            'browse' => 1,
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
