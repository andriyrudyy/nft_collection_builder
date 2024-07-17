<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class NFTGalleryService
{
    public function getImages() {
        $images = Storage::disk('public_files')->files('gallery');
        $images = array_filter($images, function ($image) { return pathinfo($image, PATHINFO_EXTENSION) === 'webp'; });
        return array_map(function ($image) { return pathinfo($image, PATHINFO_BASENAME); }, $images);
    }

    public function build(array $traits) {
        $filename = md5(serialize($traits)) . '.webp';
        Storage::disk('public_files')->makeDirectory('gallery/');
        $savePath = Storage::disk('public_files')->path('gallery/' . $filename);

        if (file_exists($savePath)) {
            return false;
        }

        $this->deleteFilesIfLimitExceeded();

        $folders = explode(',', config('app.trait_folders'));
        $folders = array_reverse($folders);

        foreach ($folders as $folder) {
            $image = Storage::disk('public_files')->path('traits/' . $folder . '/' . $traits[$folder]);
            $images[] = imagecreatefromstring(file_get_contents($image));
        }

        $result = array_shift($images);
        $width  = imagesx($result);
        $height = imagesy($result);
        imagealphablending($result, true);
        imagesavealpha($result, true);

        foreach ($images as $image) {
            imagecopy($result, $image, 0, 0, 0, 0, $width, $height);
            imagedestroy($image);
        }

        imagewebp($result, $savePath);
        imagedestroy($result);

        return true;
    }

    private function deleteFilesIfLimitExceeded() {
        // Get array of .webp files in gallery folder
        $files = Storage::disk('public_files')->files('gallery');
        $files = array_filter($files, function ($image) { return pathinfo($image, PATHINFO_EXTENSION) === 'webp'; });
        // Calculate the diff between files in gallery and max configured limit
        $filesLimitDiff = count($files) - config('app.gallery_limit');

        // Do nothing if limit is not exceeded
        if ($filesLimitDiff < 0) {
            return;
        }

        ++$filesLimitDiff;

        // Sort files array from oldest to newest
        usort($files, function($a, $b) {
            return filemtime($a) - filemtime($b);
        });

        // Extract the oldest files from array and remove them
        $filesToDelete = array_splice($files, 0 , $filesLimitDiff);
        foreach ($filesToDelete as $fileToDelete) {
            unlink($fileToDelete);
        }
    }
}
