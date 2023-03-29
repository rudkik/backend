<?php

namespace App\Constants;

class UserTypeConstant
{
    public const INDIVIDUAL = 1;
    public const LEGAL_ENTITY = 2;

    public const LEGAL_TYPES = [
        self::LEGAL_ENTITY => 'Юридическое лицо',
        self::INDIVIDUAL => 'Физическое лицо',
    ];

    public static function getUserTypeApi($id): ?array
    {
        if(isset(self::LEGAL_TYPES[$id]) && $id !== null){
            return [
                'id' => $id,
                'name' => self::LEGAL_TYPES[$id]
            ];
        }
        return null;
    }
}
