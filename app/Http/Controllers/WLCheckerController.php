<?php

namespace App\Http\Controllers;

use App\Services\WLCheckerService;
use Illuminate\Http\Request;

class WLCheckerController
{
    public function __construct(
        protected WLCheckerService $wlCheckerService,
    ) {}

    public function index() {
        return view('wl-checker');
    }

    public function search(Request $request) {
        $result = $this->wlCheckerService->searchWallet($request->wallet);

        return view('wl-checker', [
            'wallet' => $request->wallet,
            'result' => $result
        ]);
    }
}
