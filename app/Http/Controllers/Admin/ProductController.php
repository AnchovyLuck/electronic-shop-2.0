<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Services\Brand\BrandServiceInterface;

class ProductController extends Controller
{
    private $productService;
    private $productCategoryService;
    private $brandService;

    public function __construct(ProductServiceInterface $productService, ProductCategoryServiceInterface $productCategoryService, BrandServiceInterface $brandService)
    {
        $this->productService = $productService;
        $this->productCategoryService = $productCategoryService;
        $this->brandService = $brandService;
    }

    public function index(Request $request)
    {
        $products = $this->productService->searchAndPaginate('name',$request->get('search'));

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->productCategoryService->all();
        $brands = $this->brandService->all();

        return view('admin.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['qty'] = 0;
        $product = $this->productService->create($data);

        return redirect('admin/product/' . $product->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = $this->productService->find($id);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = $this->productService->find($id);
        $categories = $this->productCategoryService->all();
        $brands = $this->brandService->all();
        

        return view('admin.product.edit',compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $this->productService->update($data,$id);

        return redirect('admin/product/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->productService->delete($id);

        return redirect('admin/product');
    }
}
