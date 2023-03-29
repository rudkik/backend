<?php

declare(strict_types=1);

namespace App\Traits;

trait GeometryCast
{
    private function emptyCoordinates(): array
    {
        return [
            'lat' => config('voyager.googlemaps.center.lat'),
            'lng' => config('voyager.googlemaps.center.lng'),
        ];
    }

    public function getCoordinates(): array
    {
        $coords = [];

        if (!empty($this->spatial)) {
            foreach ($this->spatial as $column) {
                $coords[] = empty($this->$column) ? $this->emptyCoordinates() : $this->$column;
            }
        }

        return  count($coords) > 0  ? $coords : $this->emptyCoordinates();
    }
}
