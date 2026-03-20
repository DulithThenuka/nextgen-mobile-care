<?php

class Home extends Controller {

    public function index() {
        $productModel = $this->model('Product');
        $products = $productModel->getAllProducts();

        if(!$products) {
            $products = [];
        }

        $this->view('home', ['products' => $products]);
    }

    public function product($id) {
        $productModel = $this->model('Product');
        $product = $productModel->getProductById($id);

        if(!$product) {
            die('Product not found');
        }

        $this->view('product_details', ['product' => $product]);
    }
}