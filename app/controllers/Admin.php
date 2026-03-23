<?php

session_start();

class Admin extends Controller {

    public function login() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $adminModel = $this->model('AdminModel');
            $admin = $adminModel->login($username, $password);

            if($admin) {
                $_SESSION['admin_id'] = $admin->id;
                $_SESSION['admin_username'] = $admin->username;
                header('Location: /nextgen-mobile-care/public/admin/dashboard');
                exit;
            } else {
                $error = "Invalid username or password";
                $this->view('admin/login', ['error' => $error]);
            }
        } else {
            $this->view('admin/login');
        }
    }

    public function dashboard()
{
    if (!isset($_SESSION['admin_id'])) {
        header('Location: ' . URLROOT . '/admin/login');
        exit;
    }

    $productModel = $this->model('Product');
    $bookingModel = $this->model('Booking');

    $data = [
        'product_count' => $productModel->getProductCount(),
        'booking_count' => $bookingModel->getBookingCount(),
        'recent_bookings' => $bookingModel->getRecentBookings(5)
    ];

    $this->view('admin/dashboard', $data);
}
    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /nextgen-mobile-care/public/admin/login');
        exit;
    }

    public function products() {
        if(!isset($_SESSION['admin_id'])) {
            header('Location: /nextgen-mobile-care/public/admin/login');
            exit;
        }

        $productModel = $this->model('Product');
        $products = $productModel->getAllProducts();

        $this->view('admin/products', ['products' => $products]);
    }

    public function addProduct() {
        if(!isset($_SESSION['admin_id'])) {
            header('Location: /nextgen-mobile-care/public/admin/login');
            exit;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $description = trim($_POST['description']);
            $price = trim($_POST['price']);

            if(isset($_FILES['image']) && $_FILES['image']['name'] != '') {
                $imageName = time() . '_' . basename($_FILES['image']['name']);
                $targetPath = '../public/assets/images/' . $imageName;
                move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
            } else {
                $imageName = 'default.png';
            }

            $productModel = $this->model('Product');
            $productModel->addProduct($name, $description, $price, $imageName);

            header('Location: /nextgen-mobile-care/public/admin/products');
            exit;
        } else {
            $this->view('admin/product_form');
        }
    }

    public function editProduct($id) {
        if(!isset($_SESSION['admin_id'])) {
            header('Location: /nextgen-mobile-care/public/admin/login');
            exit;
        }

        $productModel = $this->model('Product');

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $description = trim($_POST['description']);
            $price = trim($_POST['price']);

            if(isset($_FILES['image']) && $_FILES['image']['name'] != '') {
                $imageName = time() . '_' . basename($_FILES['image']['name']);
                $targetPath = '../public/assets/images/' . $imageName;
                move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
            } else {
                $imageName = $_POST['old_image'];
            }

            $productModel->updateProduct($id, $name, $description, $price, $imageName);

            header('Location: /nextgen-mobile-care/public/admin/products');
            exit;
        } else {
            $product = $productModel->getProductById($id);
            $this->view('admin/product_form', ['product' => $product]);
        }
    }

    public function deleteProduct($id) {
        if(!isset($_SESSION['admin_id'])) {
            header('Location: /nextgen-mobile-care/public/admin/login');
            exit;
        }

        $productModel = $this->model('Product');
        $productModel->deleteProduct($id);

        header('Location: /nextgen-mobile-care/public/admin/products');
        exit;
    }
    public function bookings() {
    if(!isset($_SESSION['admin_id'])) {
        header('Location: /nextgen-mobile-care/public/admin/login');
        exit;
    }

    $bookingModel = $this->model('Booking');
    $bookings = $bookingModel->getAllBookings();

    $this->view('admin/bookings', ['bookings' => $bookings]);
}
public function products()
{
    if (!isset($_SESSION['admin_id'])) {
        header('Location: ' . URLROOT . '/admin/login');
        exit;
    }

    $productModel = $this->model('Product');
    $products = $productModel->getProducts();

    $data = [
        'products' => $products
    ];

    $this->view('admin/products', $data);
}

public function deleteProduct($id)
{
    if (!isset($_SESSION['admin_id'])) {
        header('Location: ' . URLROOT . '/admin/login');
        exit;
    }

    $productModel = $this->model('Product');

    if ($productModel->deleteProduct($id)) {
        header('Location: ' . URLROOT . '/admin/products');
        exit;
    } else {
        die('Failed to delete product');
    }
}