<?php

namespace App\Models;

/**
 * @method static firstOrCreate(array $array)
 */
class Permission extends \TCG\Voyager\Models\Permission
{
    private const PAGE_NAMES = [
        'browse',
        'read',
        'edit',
        'add',
        'delete'
    ];

    /**
     * @param String $tableName - Название таблицы
     * @param array $names - Название страницы ['browse', 'read', 'edit', ...]
     * @return void
     */
    public static function generate(
        string $tableName,
        array  $pageNames = self::PAGE_NAMES
    ): void {
        foreach (self::PAGE_NAMES as $pageName) {
            if (in_array($pageName, $pageNames)) {
                self::firstOrCreate(['key' => "{$pageName}_{$tableName}", 'table_name' => $tableName]);
            } else {
                self::where([
                        ['key', '=', "{$pageName}_{$tableName}"],
                        ['table_name', '=', $tableName]
                    ])->delete();
            }
        }
    }
}
