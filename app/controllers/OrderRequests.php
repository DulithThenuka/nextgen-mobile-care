<?php

class OrderRequests extends Controller
{
    private $orderRequestModel;
    private $productModel;

    public function __construct()
    {
        $this->orderRequestModel = $this->model('OrderRequest');
        $this->productModel = $this->model('Product');
    }

    public function index()
    {
        header('Location: ' . URLROOT . '/products');
        exit;
    }

    public function create($id = null)
    {
        if ($id === null) {
            header('Location: ' . URLROOT . '/products');
            exit;
        }

        $product = $this->productModel->getProductById($id);

        if (!$product) {
            die('Product not found');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'product' => $product,
                'name' => trim($_POST['name']),
                'phone' => trim($_POST['phone']),
                'address' => trim($_POST['address']),
                'quantity' => trim($_POST['quantity']),
                'name_err' => '',
                'phone_err' => '',
                'address_err' => '',
                'quantity_err' => ''
            ];

            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter your name';
            }

            if (empty($data['phone'])) {
                $data['phone_err'] = 'Please enter your phone number';
            }

            if (empty($data['address'])) {
                $data['address_err'] = 'Please enter your address';
            }

            if (empty($data['quantity'])) {
                $data['quantity_err'] = 'Please enter quantity';
            } elseif (!is_numeric($data['quantity']) || (int)$data['quantity'] < 1) {
                $data['quantity_err'] = 'Quantity must be at least 1';
            } elseif ((int)$data['quantity'] > (int)$product->stock) {
                $data['quantity_err'] = 'Requested quantity exceeds available stock';
            }

            if ((int)$product->stock <= 0) {
                $data['quantity_err'] = 'This product is out of stock';
            }

            if (
                empty($data['name_err']) &&
                empty($data['phone_err']) &&
                empty($data['address_err']) &&
                empty($data['quantity_err'])
            ) {
                $orderData = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'customer_name' => $data['name'],
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'quantity' => $data['quantity']
                ];

                if ($this->orderRequestModel->createOrderRequest($orderData)) {
                    header('Location: ' . URLROOT . '/products/show/' . $product->id);
                    exit;
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('orders/create', $data);
            }
        } else {
            $data = [
                'product' => $product,
                'name' => '',
                'phone' => '',
                'address' => '',
                'quantity' => 1,
                'name_err' => '',
                'phone_err' => '',
                'address_err' => '',
                'quantity_err' => ''
            ];

            $this->view('orders/create', $data);
        }
    }
}