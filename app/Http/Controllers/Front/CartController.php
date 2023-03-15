<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $productService;
    private $cart;

    public function __construct(ProductServiceInterface $productService) {
        $this->productService = $productService;
    }

    public function add($id) {
        $product = $this->productService->find($id);

        // $product= $this->cart->addItem([

        // ]);
    }
}
