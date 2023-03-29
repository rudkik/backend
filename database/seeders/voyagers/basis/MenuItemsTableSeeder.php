<?php

namespace Database\Seeders\voyagers\basis;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::where('name', 'admin')->firstOrFail();

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Объявление',
            'url' => '',
            'route' => 'voyager.advertisements.index',
            'target' => '_self',
            'icon_class' => 'voyager-book-download',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);

        MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Категории',
            'url' => '',
            'route' => 'voyager.categories.index',
            'target' => '_self',
            'icon_class' => 'voyager-categories',
            'color' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Новости',
            'url' => '',
            'route' => 'voyager.news.index',
            'target' => '_self',
            'icon_class' => 'voyager-news',
            'color' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Текстовые страницы',
            'url' => '',
            'route' => 'voyager.pages.index',
            'target' => '_self',
            'icon_class' => 'voyager-file-text',
            'color' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Меню',
            'url' => '',
            'route' => 'voyager.main_menus.index',
            'target' => '_self',
            'icon_class' => 'voyager-file-text',
            'color' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Заявки',
            'url' => '',
            'route' => 'voyager.handbook_requests.index',
            'target' => '_self',
            'icon_class' => 'voyager-documentation',
            'color' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Обратная связь',
            'url' => '',
            'route' => 'voyager.feedback.index',
            'target' => '_self',
            'icon_class' => 'voyager-window-list',
            'color' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'FAQ',
            'url' => '',
            'route' => 'voyager.faqs.index',
            'target' => '_self',
            'icon_class' => 'voyager-pen',
            'color' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Контакты',
            'url' => '',
            'route' => 'voyager.contacts.index',
            'target' => '_self',
            'icon_class' => 'voyager-world',
            'color' => null,
            'order' => 1,
        ]);

        $menuItemParent = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Локации',
            'url' => '',
            'target' => '_self',
            'icon_class' => 'voyager-location',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Страны',
            'url' => '',
            'route' => 'voyager.location_countries.index',
            'target' => '_self',
            'icon_class' => 'voyager-location',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Города',
            'url' => '',
            'route' => 'voyager.location_cities.index',
            'target' => '_self',
            'icon_class' => 'voyager-location',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItemParent = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Контент',
            'url' => '',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Аналитика',
            'url' => '',
            'route' => 'voyager.analytics.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Поставки',
            'url' => '',
            'route' => 'voyager.supplies.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);

        $menuItemParent = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Справочники',
            'url' => '',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Страны',
            'url' => '',
            'route' => 'voyager.handbook_countries.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Области',
            'url' => '',
            'route' => 'voyager.handbook_regions.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Города',
            'url' => '',
            'route' => 'voyager.handbook_cities.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Тип компании',
            'url' => '',
            'route' => 'voyager.handbook_company_types.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Тип меню',
            'url' => '',
            'route' => 'voyager.handbook_menu_types.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Категории культур',
            'url' => '',
            'route' => 'voyager.handbook_crop_categories.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Культуры',
            'url' => '',
            'route' => 'voyager.handbook_crops.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Тип',
            'url' => '',
            'route' => 'voyager.handbook_types.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Название классов',
            'url' => '',
            'route' => 'voyager.class_names.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Цвета',
            'url' => '',
            'route' => 'voyager.handbook_colors.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Запахи',
            'url' => '',
            'route' => 'voyager.handbook_smells.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Обратная связь',
            'url' => '',
            'route' => 'voyager.handbook_feedback.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Новость: теги',
            'url' => '',
            'route' => 'voyager.handbook_news_tags.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Заявка: тематики',
            'url' => '',
            'route' => 'voyager.handbook_request_subjects.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItemParent = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Пользователи',
            'url' => '',
            'target' => '_self',
            'icon_class' => 'voyager-group',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Пользователи',
            'url' => '',
            'route' => 'voyager.users.index',
            'target' => '_self',
            'icon_class' => 'voyager-person',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Юр лица',
            'url' => '',
            'route' => 'voyager.user_legals.index',
            'target' => '_self',
            'icon_class' => 'voyager-person',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Роли',
            'url' => '',
            'route' => 'voyager.roles.index',
            'target' => '_self',
            'icon_class' => 'voyager-lock',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItemParent = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Настройки',
            'url' => '',
            'target' => '_self',
            'icon_class' => 'voyager-tools',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Компоненты',
            'url' => '',
            'route' => 'voyager.voyager_template_components.index',
            'target' => '_self',
            'icon_class' => 'voyager-tools',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Проект',
            'url' => '',
            'route' => 'voyager.settings.index',
            'target' => '_self',
            'icon_class' => 'voyager-settings',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'SEO',
            'url' => '',
            'route' => 'voyager.seo_pages.index',
            'target' => '_self',
            'icon_class' => 'voyager-wand',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Медиа',
            'url' => '',
            'route' => 'voyager.media.index',
            'target' => '_self',
            'icon_class' => 'voyager-images',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);
    }
}
