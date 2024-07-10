<?php

namespace App\Http\Controllers;

use App\Services\PFPBuilderService;

class PFPBuilderController
{
    public function __construct(
        protected PFPBuilderService $pfpBuilderService,
    ) {}

    public function index() {
        $dropdowns = $this->pfpBuilderService->getDropdowns();
        return view('pfp-builder', [ 'dropdowns' => $dropdowns ]);
    }
}
