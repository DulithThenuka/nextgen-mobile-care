<?php

class OrderRequests extends Controller
{
    public function create($productId)
    {
        $productModel = $this->model('Product');
        $product = $productModel->getProductById($productId);

        if (!$product) {
            die('Product not found');
        }

        $this->view('orders/create', ['product' => $product]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = trim($_POST['product_id']);
            $productName = trim($_POST['product_name']);
            $customerName = trim($_POST['customer_name']);
            $phone = trim($_POST['phone']);
            $address = trim($_POST['address']);
            $quantity = (int) trim($_POST['quantity']);

            $orderRequestModel = $this->model('OrderRequest');
            $orderRequestModel->addOrderRequest($productId, $productName, $customerName, $phone, $address, $quantity);

            header('Location: ' . URLROOT . '/orderrequests/success');
            exit;
        }

        header('Location: ' . URLROOT . '/products');
        exit;
    }

    public function success()
    {
        $this->view('orders/success');
    }
}