<?php

class Products extends Controller
{
    public function index()
    {
        $productModel = $this->model('Product');

        $search = isset($_GET['search']) ? trim($_GET['search']) : '';
        $sort = isset($_GET['sort']) ? trim($_GET['sort']) : '';
        $category = isset($_GET['category']) ? trim($_GET['category']) : '';

        $products = $productModel->searchAndFilterProducts($search, $sort, $category);

        $data = [
            'title' => 'Products',
            'products' => $products,
            'search' => $search,
            'sort' => $sort,
            'category' => $category
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