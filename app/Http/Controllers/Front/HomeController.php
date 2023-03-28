<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Blog\BlogServiceInterface;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $productService;
    private $productCategoryService;
    private $blogService;

    public function __construct(ProductServiceInterface $productService, BlogServiceInterface $blogService, 
    ProductCategoryServiceInterface $productCateogoryService) {
        $this->productService = $productService;
        $this->blogService = $blogService;
        $this->productCategoryService = $productCateogoryService;
    }

    public function index() {
        $categories = $this->productCategoryService->all();
        $featuredProducts = $this->productService->getFeaturedProducts();
        $blogs = $this->blogService->getLatestBlogs();

        return view('front/index', compact('featuredProducts', 'blogs', 'categories'));
    }

    public function about() {
        $categories = $this->productCategoryService->all();
        return view('front/about', compact('categories'));
    }

    public function test() {
        return view('front.layout.test');
    }
}
