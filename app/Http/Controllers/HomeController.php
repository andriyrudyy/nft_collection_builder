<?php

namespace App\Http\Controllers;

use App\Services\WalletService;
use Illuminate\Http\Request;

class HomeController
{
    public function __construct(
        protected WalletService $walletService,
    ) {}

    public function index() {
        return view('home');
    }

    public function search(Request $request) {
        $result = $this->walletService->searchWallet($request->wallet);

        return view('home', [
            'wallet' => $request->wallet,
            'result' => $result
        ]);
    }


}
