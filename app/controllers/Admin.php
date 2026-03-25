<?php

session_start();

class Admin extends Controller
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $adminModel = $this->model('AdminModel');
            $admin = $adminModel->login($username, $password);

            if ($admin) {
                $_SESSION['admin_id'] = $admin->id;
                $_SESSION['admin_username'] = $admin->username;
                header('Location: ' . URLROOT . '/admin/dashboard');
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

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ' . URLROOT . '/admin/login');
        exit;
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

    public function addProduct()
    {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: ' . URLROOT . '/admin/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           $name = trim($_POST['name']);
$description = trim($_POST['description']);
$price = trim($_POST['price']);
$category = trim($_POST['category']);
$stock = (int) trim($_POST['stock']);

$imageName = 'default.png';

if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
    $imageName = time() . '_' . basename($_FILES['image']['name']);
    $targetPath = dirname(APPROOT) . '/public/uploads/' . $imageName;
    move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
}

$productModel = $this->model('Product');
$productModel->addProduct($name, $description, $price, $imageName, $category, $stock);

header('Location: ' . URLROOT . '/admin/products');
exit;
        } else {
            $this->view('admin/add_product');
        }
    }

    public function editProduct($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: ' . URLROOT . '/admin/login');
            exit;
        }

        $productModel = $this->model('Product');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
$description = trim($_POST['description']);
$price = trim($_POST['price']);
$category = trim($_POST['category']);
$stock = (int) trim($_POST['stock']);

if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
    $imageName = time() . '_' . basename($_FILES['image']['name']);
    $targetPath = dirname(APPROOT) . '/public/uploads/' . $imageName;
    move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
} else {
    $imageName = $_POST['old_image'];
}

$productModel->updateProduct($id, $name, $description, $price, $imageName, $category, $stock);

header('Location: ' . URLROOT . '/admin/products');
exit;
        } else {
            $product = $productModel->getProductById($id);
            $this->view('admin/product_form', ['product' => $product]);
        }
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

    public function bookings()
    {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: ' . URLROOT . '/admin/login');
            exit;
        }

        $bookingModel = $this->model('Booking');
        $bookings = $bookingModel->getAllBookings();

        $this->view('admin/bookings', ['bookings' => $bookings]);
    }
    public function messages()
{
    if (!isset($_SESSION['admin_id'])) {
        header('Location: ' . URLROOT . '/admin/login');
        exit;
    }

    $contactModel = $this->model('Contact');
    $messages = $contactModel->getAllMessages();

    $this->view('admin/messages', ['messages' => $messages]);
}
public function orders()
{
    if (!isset($_SESSION['admin_id'])) {
        header('Location: ' . URLROOT . '/admin/login');
        exit;
    }

    $orderRequestModel = $this->model('OrderRequest');
    $orders = $orderRequestModel->getAllOrderRequests();

    $this->view('admin/orders', ['orders' => $orders]);
}
}