<?php

class Home extends Controller {

   public function index() {

    $productModel = $this->model('Product');
    $products = $productModel->getAllProducts();

    $this->view('home', ['products' => $products]);
}
} 
