<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class PFPBuilderService
{
    public function getDropdowns() {
        return array_map(function ($folder) {
            return $this->getTraitItems($folder);
        }, ['hats', 'horns', 'mouth', 'eyes', 'clothes', 'body', 'background']);
    }

    private function getTraitItems($folder) {
        $items = Storage::disk('public_files')->files('traits/' . $folder);

        $items = array_map(function ($item) {
            return pathinfo($item, PATHINFO_FILENAME);
        }, $items);

        $result = new \stdClass();
        $result->name = $folder;
        $result->selected = rand(0, count($items) - 1);
        $result->items = $items;

        return $result;
    }
}
