<?php

class Home extends Controller
{
    public function index()
    {
        $productModel = $this->model('Product');

        $products = [];
        if (method_exists($productModel, 'getFeaturedProducts')) {
            $products = $productModel->getFeaturedProducts();
        } elseif (method_exists($productModel, 'getProducts')) {
            $products = $productModel->getProducts();
        }

        $data = [
            'title' => 'NextGen Mobile Care',
            'products' => $products
        ];

        $this->view('home/index', $data);
    }
}