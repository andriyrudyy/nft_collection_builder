<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class WLCheckerService
{
    public function searchWallet($wallet) {
        if ($this->searchInFile('wallets/gtd.txt', $wallet)) {
            $result = 'You are allowed to GTD Mint Phase';
        } else if ($this->searchInFile('wallets/fcfs.txt', $wallet)) {
            $result = 'You are allowed to FCFS(First Come, First Served) Mint Phase';
        } else {
            $result = 'You are allowed to Public Mint Phase';
        }

        return $result;
    }

    private function searchInFile(string $filename, string $pattern) {
        $content = Storage::disk('local')->get($filename);

        $pattern = preg_quote($pattern);
        // finalise the regular expression, matching the whole line
        $pattern = "/^.*$pattern.*\$/m";

        return preg_match($pattern, $content);
    }
}
