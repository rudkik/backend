<?php

namespace Database\Seeders;

use Database\Seeders\voyagers\basis\RolesTableSeeder;
use Database\Seeders\voyagers\basis\MenusTableSeeder;
use Database\Seeders\voyagers\basis\MenuItemsTableSeeder;
use Database\Seeders\voyagers\basis\SettingsTableSeeder;
use Database\Seeders\voyagers\basis\PermissionsTableSeeder;
use Database\Seeders\voyagers\basis\PermissionRoleSeeder;
use Database\Seeders\voyagers\breads\AnalyticsTableSeeder;
use Database\Seeders\voyagers\breads\SuppliesTableSeeder;
use Database\Seeders\voyagers\breads\CategoryTableSeeder;
use Database\Seeders\voyagers\breads\ContactTableSeeder;
use Database\Seeders\voyagers\breads\ClassNameTableSeeder;
use Database\Seeders\voyagers\breads\FaqTableSeeder;
use Database\Seeders\voyagers\breads\HandbookCityTableSeeder;
use Database\Seeders\voyagers\breads\HandbookCropColorTableSeeder;
use Database\Seeders\voyagers\breads\HandbookCompanyTypeTableSeeder;
use Database\Seeders\voyagers\breads\HandbookCountryTableSeeder;
use Database\Seeders\voyagers\breads\HandbookCropCategoryTableSeeder;
use Database\Seeders\voyagers\breads\HandbookCropTableSeeder;
use Database\Seeders\voyagers\breads\HandbookMenuTypeTableSeeder;
use Database\Seeders\voyagers\breads\HandbookRegionTableSeeder;
use Database\Seeders\voyagers\breads\HandbookSmellTableSeeder;
use Database\Seeders\voyagers\breads\HandbookCropTypeTableSeeder;
use Database\Seeders\voyagers\breads\MainMenuTableSeeder;
use Database\Seeders\voyagers\breads\AdvertisementTableSeeder;
use Database\Seeders\voyagers\breads\UserLegalTableSeeder;
use Database\Seeders\voyagers\breads\UserTableSeeder;
use Database\Seeders\voyagers\breads\NewsTableSeeder;
use Database\Seeders\voyagers\breads\FeedbackTableSeeder;
use Database\Seeders\voyagers\breads\HandbookFeedbackTableSeeder;
use Database\Seeders\voyagers\breads\HandbookNewsTagTableSeeder;
use Database\Seeders\voyagers\breads\HandbookRequestSubjectTableSeeder;
use Database\Seeders\voyagers\breads\LocationCityTableSeeder;
use Database\Seeders\voyagers\breads\LocationCountryTableSeeder;
use Database\Seeders\voyagers\breads\PageTableSeeder;
use Database\Seeders\voyagers\breads\SeoPageTableSeeder;
use Database\Seeders\voyagers\breads\HandbookRequestTableSeeder;
use Database\Seeders\voyagers\breads\VoyagerTemplateComponentsTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateVoyagerSeed();
        $this->callVoyagerBreadTables();
        $this->callVoyagerBasicTables();
        $this->callDataFakes();
        $this->callDataOriginals();
    }

    /**
     * Очистка старых данных для voyager.
     */
    private function truncateVoyagerSeed()
    {
        DB::table('menu_items')->truncate();
        DB::table('settings')->truncate();
        DB::table('permission_role')->where('role_id', '=', 1)->delete();
        DB::table('menus')->truncate();
        DB::table('data_rows')->truncate();
        DB::table('data_types')->truncate();
    }

    /**
     * Вызов объектов по namespace "\Database\Seeders\voyagers\breads"
     */
    private function callVoyagerBreadTables()
    {
        $this->call(ContactTableSeeder::class);
        $this->call(FeedbackTableSeeder::class);
        $this->call(FaqTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(LocationCountryTableSeeder::class);
        $this->call(LocationCityTableSeeder::class);
        $this->call(HandbookFeedbackTableSeeder::class);
        $this->call(HandbookCountryTableSeeder::class);
        $this->call(HandbookRegionTableSeeder::class);
        $this->call(HandbookCityTableSeeder::class);
        $this->call(HandbookCompanyTypeTableSeeder::class);
        $this->call(HandbookCropCategoryTableSeeder::class);
        $this->call(HandbookCropTableSeeder::class);
        $this->call(HandbookRequestSubjectTableSeeder::class);
        $this->call(HandbookNewsTagTableSeeder::class);
        $this->call(SeoPageTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(HandbookRequestTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(VoyagerTemplateComponentsTableSeeder::class);
        $this->call(MainMenuTableSeeder::class);
        $this->call(UserLegalTableSeeder::class);
        $this->call(AnalyticsTableSeeder::class);
        $this->call(HandbookCropTypeTableSeeder::class);
        $this->call(HandbookCropColorTableSeeder::class);
        $this->call(HandbookSmellTableSeeder::class);
        $this->call(AdvertisementTableSeeder::class);
        $this->call(ClassNameTableSeeder::class);

    }

    /**
     * Вызов объектов по namespace "Database\Seeders\voyagers\basis"
     */
    private function callVoyagerBasicTables()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionRoleSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }

    /**
     * Вызов объектов по namespace "\Database\Seeders\data\fakes"
     */
    private function callDataFakes()
    {
        $this->call(\Database\Seeders\data\fakes\FaqTableSeeder::class);
        $this->call(\Database\Seeders\data\fakes\FeedbackTableSeeder::class);
        $this->call(\Database\Seeders\data\fakes\SeoPageTableSeeder::class);
        $this->call(\Database\Seeders\data\fakes\ContactTableSeeder::class);
    }

    /**
     * Вызов объектов по namespace "\Database\Seeders\data\originals"
     */
    private function callDataOriginals()
    {
        $this->call(\Database\Seeders\data\originals\HandbookCountryTableSeeder::class);
        $this->call(\Database\Seeders\data\originals\HandbookRegionTableSeeder::class);
        $this->call(\Database\Seeders\data\originals\HandbookCityTableSeeder::class);
        $this->call(\Database\Seeders\data\originals\UserActivityTableSeeder::class);
        $this->call(\Database\Seeders\data\originals\AnalyticsTableSeeder::class);
        $this->call(\Database\Seeders\data\originals\HandbookCropTypeTableSeeder::class);
        $this->call(\Database\Seeders\data\originals\HandbookCropColorTableSeeder::class);
        $this->call(\Database\Seeders\data\originals\HandbookSmellTableSeeder::class);
        $this->call(\Database\Seeders\data\originals\HandbookMenuTypeTableSeeder::class);
    }
}
