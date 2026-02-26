<?php

class AdminController extends Controller {

    public function login() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $adminModel = $this->model('Admin');
            $admin = $adminModel->login($username, $password);

            if($admin) {
                session_start();
                $_SESSION['admin_id'] = $admin->id;
                $_SESSION['admin_username'] = $admin->username;
                header('Location: /nextgen-mobile-care/public/admin/dashboard');
            } else {
                $error = "Invalid username or password";
                $this->view('admin/login', ['error' => $error]);
            }
        } else {
            $this->view('admin/login');
        }
    }

    public function dashboard() {
        session_start();
        if(!isset($_SESSION['admin_id'])) {
            header('Location: /nextgen-mobile-care/public/admin/login');
            exit;
        }

        $this->view('admin/dashboard');
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /nextgen-mobile-care/public/admin/login');
    }

    // Show all products
public function products() {
    session_start();
    if(!isset($_SESSION['admin_id'])) {
        header('Location: /nextgen-mobile-care/public/admin/login');
        exit;
    }

    $productModel = $this->model('Product');
    $products = $productModel->getAllProducts();

    $this->view('admin/products', ['products' => $products]);
}

// Add new product
public function addProduct() {
    session_start();
    if(!isset($_SESSION['admin_id'])) {
        header('Location: /nextgen-mobile-care/public/admin/login');
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        // Handle image upload
        if(isset($_FILES['image']) && $_FILES['image']['name'] != '') {
            $imageName = time() . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/' . $imageName);
        } else {
            $imageName = 'default.png';
        }

        $productModel = $this->model('Product');
        $productModel->addProduct($name, $description, $price, $imageName);

        header('Location: /nextgen-mobile-care/public/admin/products');
    } else {
        $this->view('admin/product_form');
    }
}

// Edit product
public function editProduct($id) {
    session_start();
    if(!isset($_SESSION['admin_id'])) {
        header('Location: /nextgen-mobile-care/public/admin/login');
        exit;
    }

    $productModel = $this->model('Product');

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        // Handle image upload
        if(isset($_FILES['image']) && $_FILES['image']['name'] != '') {
            $imageName = time() . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/' . $imageName);
        } else {
            $imageName = $_POST['old_image'];
        }

        $productModel->updateProduct($id, $name, $description, $price, $imageName);

        header('Location: /nextgen-mobile-care/public/admin/products');
    } else {
        $product = $productModel->getProductById($id);
        $this->view('admin/product_form', ['product' => $product]);
    }
}

// Delete product
public function deleteProduct($id) {
    session_start();
    if(!isset($_SESSION['admin_id'])) {
        header('Location: /nextgen-mobile-care/public/admin/login');
        exit;
    }

    $productModel = $this->model('Product');
    $productModel->deleteProduct($id);

    header('Location: /nextgen-mobile-care/public/admin/products');
}
}