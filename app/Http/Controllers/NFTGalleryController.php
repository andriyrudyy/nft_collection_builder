<?php

namespace App\Http\Controllers;

use App\Services\NFTGalleryService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NFTGalleryController
{
    public function __construct(
        protected NFTGalleryService $nftGalleryService,
    ) {}

    public function index() {
        $images = $this->nftGalleryService->getImages();
        return view('nft-gallery', ['images' => $images]);
    }

    public function build(Request $request) {
        $this->nftGalleryService->build($request->post());
        response()->noContent(Response::HTTP_OK);
    }
}
