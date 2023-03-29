<?php

declare(strict_types=1);

namespace App\Voyager\ContentTypes;


use TCG\Voyager\Http\Controllers\ContentTypes\BaseType;

final class CoordinateType extends BaseType
{
    public function handle() : array
    {
        if (empty($coordinates = $this->request->input($this->row->field))) {
            return [
                'lat' => null,
                'lng' => null,
            ];
        }

        return $coordinates;
    }
}
