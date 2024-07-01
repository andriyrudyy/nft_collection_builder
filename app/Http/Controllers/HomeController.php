<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController
{
    public function index() {
        return view('home');
    }

    public function search(Request $request) {
        if ($this->searchInFile('wallets/1 gtd.txt', $request->wallet)) {
            $result = 'Found in 1 gtd.txt';
        } else if ($this->searchInFile('wallets/2 fcfs.txt', $request->wallet)) {
            $result = 'Found in 2 fcfs.txt';
        } else {
            $result = 'Not found';
        }

        return view('home', [
            'wallet' => $request->wallet,
            'result' => $result
        ]);
    }

    private function searchInFile(string $filename, string $pattern) {
        $content = Storage::disk('local')->get($filename);

        $pattern = preg_quote($pattern);
        // finalise the regular expression, matching the whole line
        $pattern = "/^.*$pattern.*\$/m";

        return preg_match($pattern, $content);
    }
}
