<?php

session_start();

class Admin extends Controller{
    private $adminModel;
    private $productModel;
    private $bookingModel;
    private $orderRequestModel;
    private $contactModel;

    public function __construct()
    {
        $this->adminModel = $this->model('AdminModel');
        $this->productModel = $this->model('Product');
        $this->bookingModel = $this->model('Booking');
        $this->orderRequestModel = $this->model('OrderRequest');
        $this->contactModel = $this->model('Contact');
    }

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
    if(!isset($_SESSION['admin_id'])) {
        header('Location: ' . URLROOT . '/admin/login');
        exit;
    }

    $orderStatusData = $this->orderRequestModel->getOrderStatusCounts();
    $productCategoryData = $this->productModel->getProductsByCategory();
    $bookingStatusData = $this->bookingModel->getBookingStatusCounts();

    $orderLabels = [];
    $orderCounts = [];

    foreach($orderStatusData as $row) {
        $orderLabels[] = $row->status;
        $orderCounts[] = $row->total;
    }

    $categoryLabels = [];
    $categoryCounts = [];

    foreach($productCategoryData as $row) {
        $categoryLabels[] = $row->category;
        $categoryCounts[] = $row->total;
    }

    $bookingLabels = [];
    $bookingCounts = [];

    foreach($bookingStatusData as $row) {
        $bookingLabels[] = $row->status;
        $bookingCounts[] = $row->total;
    }

    $monthlyBookingsData = $this->bookingModel->getMonthlyBookings();
    $monthlyOrdersData = $this->orderRequestModel->getMonthlyOrders();
    $monthlyMessagesData = $this->contactModel->getMonthlyMessages();

    $months = [];
    $bookingMonthlyMap = [];
    $orderMonthlyMap = [];
    $messageMonthlyMap = [];

    foreach($monthlyBookingsData as $row) {
        $months[] = $row->month_label;
        $bookingMonthlyMap[$row->month_label] = $row->total;
    }

    foreach($monthlyOrdersData as $row) {
        if(!in_array($row->month_label, $months)) {
            $months[] = $row->month_label;
        }
        $orderMonthlyMap[$row->month_label] = $row->total;
    }

    foreach($monthlyMessagesData as $row) {
        if(!in_array($row->month_label, $months)) {
            $months[] = $row->month_label;
        }
        $messageMonthlyMap[$row->month_label] = $row->total;
    }

    sort($months);

    $monthlyBookingCounts = [];
    $monthlyOrderCounts = [];
    $monthlyMessageCounts = [];

    foreach($months as $month) {
        $monthlyBookingCounts[] = isset($bookingMonthlyMap[$month]) ? $bookingMonthlyMap[$month] : 0;
        $monthlyOrderCounts[] = isset($orderMonthlyMap[$month]) ? $orderMonthlyMap[$month] : 0;
        $monthlyMessageCounts[] = isset($messageMonthlyMap[$month]) ? $messageMonthlyMap[$month] : 0;
    }

    $lowStockCount = $this->productModel->getLowStockCount();
    $outOfStockCount = $this->productModel->getOutOfStockCount();
    $totalStockAlerts = $lowStockCount + $outOfStockCount;

    $data = [
        'title' => 'Admin Dashboard',
        'productCount' => $this->productModel->getProductCount(),
        'bookingCount' => $this->bookingModel->getTotalBookings(),
        'orderCount' => $this->orderRequestModel->getTotalOrders(),
        'messageCount' => $this->contactModel->getTotalMessages(),
        'lowStockCount' => $lowStockCount,
        'outOfStockCount' => $outOfStockCount,
        'totalStockAlerts' => $totalStockAlerts,
        'recentBookings' => $this->bookingModel->getRecentBookings(5),
        'recentOrders' => $this->orderRequestModel->getRecentOrders(5),
        'recentMessages' => $this->contactModel->getRecentMessages(5),
        'lowStockProducts' => $this->productModel->getLowStockProducts(5),
        'orderLabels' => $orderLabels,
        'orderCounts' => $orderCounts,
        'categoryLabels' => $categoryLabels,
        'categoryCounts' => $categoryCounts,
        'bookingLabels' => $bookingLabels,
        'bookingCounts' => $bookingCounts,
        'months' => $months,
        'monthlyBookingCounts' => $monthlyBookingCounts,
        'monthlyOrderCounts' => $monthlyOrderCounts,
        'monthlyMessageCounts' => $monthlyMessageCounts
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

    public function updateOrderStatus($id, $status)
    {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: ' . URLROOT . '/admin/login');
            exit;
        }

        $orderModel = $this->model('OrderRequest');
        $productModel = $this->model('Product');

        $order = $orderModel->getById($id);

        if (!$order) {
            die('Order not found');
        }

        if ($status === 'Approved') {
            $product = $productModel->getProductById($order->product_id);

            if (!$product) {
                die('Product not found');
            }

            if ($order->quantity > $product->stock) {
                die('Not enough stock to approve this order');
            }

            $productModel->reduceStock($order->product_id, $order->quantity);
        }

        $orderModel->updateStatus($id, $status);

        header('Location: ' . URLROOT . '/admin/orders');
        exit;
    }
}