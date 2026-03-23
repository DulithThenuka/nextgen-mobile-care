<?php

class Products extends Controller
{
    public function index()
    {
        $productModel = $this->model('Product');

        // get all products
        $products = $productModel->getProducts();

        $data = [
            'title' => 'Products',
            'products' => $products
        ];

        $this->view('products/index', $data);
    }
    public function show($id)
{
    $productModel = $this->model('Product');

    $product = $productModel->getProductById($id);

    if (!$product) {
        die('Product not found');
    }

    $data = [
        'product' => $product
    ];

    $this->view('products/show', $data);
}
}