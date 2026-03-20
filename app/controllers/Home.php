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
}
 
