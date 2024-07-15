<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class PFPBuilderService
{
    public function getDropdowns() {
        $folders = explode(',', config('app.trait_folders'));

        return array_map(function ($folder) {
            return $this->getTraitItems($folder);
        }, $folders);
    }

    private function getTraitItems($folder) {
        $items = Storage::disk('public_files')->files('traits/' . $folder);

        $items = array_map(function ($item) {
            $option = new \stdClass();

            $option->value = pathinfo($item, PATHINFO_BASENAME);

            $parts = explode('_', pathinfo($option->value, PATHINFO_FILENAME));
            $parts = array_map(function ($part) {
                if (in_array($part, ['btc', 'omb'])) {
                    return strtoupper($part);
                }
                return ucfirst($part);
            },$parts);

            $option->name = implode(' ', $parts);

            return $option;
        }, $items);

        $result = new \stdClass();
        $result->name = $folder;
        $result->selected = rand(0, count($items) - 1);
        $result->items = $items;

        return $result;
    }
}
