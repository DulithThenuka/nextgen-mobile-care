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

    private function requireAdmin()
    {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: ' . URLROOT . '/admin/login');
            exit;
        }
    }

    public function index()
    {
        $this->dashboard();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $admin = $this->adminModel->login($username, $password);

            if ($admin) {
                $_SESSION['admin_id'] = $admin->id;
                $_SESSION['admin_username'] = $admin->username;
                header('Location: ' . URLROOT . '/admin/dashboard');
                exit;
            } else {
                $this->view('admin/login', ['error' => "Invalid username or password"]);
            }
        } else {
            $this->view('admin/login');
        }
    }

    public function dashboard()
    {
        $this->requireAdmin();

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
            $monthlyBookingCounts[] = $bookingMonthlyMap[$month] ?? 0;
            $monthlyOrderCounts[] = $orderMonthlyMap[$month] ?? 0;
            $monthlyMessageCounts[] = $messageMonthlyMap[$month] ?? 0;
        }

        $lowStockCount = $this->productModel->getLowStockCount();
        $outOfStockCount = $this->productModel->getOutOfStockCount();

        $data = [
            'title' => 'Admin Dashboard',
            'productCount' => $this->productModel->getProductCount(),
            'bookingCount' => $this->bookingModel->getTotalBookings(),
            'orderCount' => $this->orderRequestModel->getTotalOrders(),
            'messageCount' => $this->contactModel->getTotalMessages(),
            'lowStockCount' => $lowStockCount,
            'outOfStockCount' => $outOfStockCount,
            'totalStockAlerts' => $lowStockCount + $outOfStockCount,
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
        $this->requireAdmin();

        $products = $this->productModel->getProducts();

        $this->view('admin/products', ['products' => $products]);
    }

    public function addProduct()
    {
        $this->requireAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $description = trim($_POST['description']);
            $price = trim($_POST['price']);
            $category = trim($_POST['category']);
            $stock = (int) trim($_POST['stock']);

            $imageName = 'default.png';

            if (!empty($_FILES['image']['name'])) {
                $imageName = time() . '_' . basename($_FILES['image']['name']);
                $targetPath = dirname(APPROOT) . '/public/uploads/' . $imageName;
                move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
            }

            $this->productModel->addProduct($name, $description, $price, $imageName, $category, $stock);

            header('Location: ' . URLROOT . '/admin/products');
            exit;
        }

        $this->view('admin/add_product');
    }

    public function editProduct($id)
    {
        $this->requireAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $description = trim($_POST['description']);
            $price = trim($_POST['price']);
            $category = trim($_POST['category']);
            $stock = (int) trim($_POST['stock']);

            if (!empty($_FILES['image']['name'])) {
                $imageName = time() . '_' . basename($_FILES['image']['name']);
                $targetPath = dirname(APPROOT) . '/public/uploads/' . $imageName;
                move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
            } else {
                $imageName = $_POST['old_image'];
            }

            $this->productModel->updateProduct($id, $name, $description, $price, $imageName, $category, $stock);

            header('Location: ' . URLROOT . '/admin/products');
            exit;
        }

        $product = $this->productModel->getProductById($id);
        $this->view('admin/product_form', ['product' => $product]);
    }

    public function deleteProduct($id)
    {
        $this->requireAdmin();

        if ($this->productModel->deleteProduct($id)) {
            header('Location: ' . URLROOT . '/admin/products');
            exit;
        }

        die('Failed to delete product');
    }

    public function bookings()
    {
        $this->requireAdmin();

        $bookings = $this->bookingModel->getAllBookings();
        $this->view('admin/bookings', ['bookings' => $bookings]);
    }

    public function messages()
    {
        $this->requireAdmin();

        $messages = $this->contactModel->getAllMessages();
        $this->view('admin/messages', ['messages' => $messages]);
    }

    public function orders()
    {
        $this->requireAdmin();

        $orders = $this->orderRequestModel->getAllOrderRequests();
        $this->view('admin/orders', ['orders' => $orders]);
    }

    public function updateOrderStatus($id, $status)
    {
        $this->requireAdmin();

        $order = $this->orderRequestModel->getById($id);

        if (!$order) {
            die('Order not found');
        }

        if ($status === 'Approved') {
            $product = $this->productModel->getProductById($order->product_id);

            if (!$product || $order->quantity > $product->stock) {
                die('Not enough stock');
            }

            $this->productModel->reduceStock($order->product_id, $order->quantity);
        }

        $this->orderRequestModel->updateStatus($id, $status);

        header('Location: ' . URLROOT . '/admin/orders');
        exit;
    }

    public function approve_order($id)
    {
        $this->updateOrderStatus($id, 'Approved');
    }

    public function reject_order($id)
    {
        $this->updateOrderStatus($id, 'Rejected');
    }

    public function view_order($id)
    {
        $this->requireAdmin();

        $order = $this->orderRequestModel->getById($id);

        if (!$order) {
            die('Order not found');
        }

        $this->view('admin/order_view', ['order' => $order]);
    }

    public function delete_order($id)
    {
        $this->requireAdmin();

        if ($this->orderRequestModel->deleteOrderRequest($id)) {
            header('Location: ' . URLROOT . '/admin/orders');
            exit;
        }

        die('Failed to delete order');
    }

    public function view_booking($id)
    {
        $this->requireAdmin();

        $booking = $this->bookingModel->getBookingById($id);

        if (!$booking) {
            die('Booking not found');
        }

        $this->view('admin/booking_view', ['booking' => $booking]);
    }

    public function edit_booking($id)
    {
        $this->requireAdmin();

        $booking = $this->bookingModel->getBookingById($id);

        if (!$booking) {
            die('Booking not found');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = trim($_POST['status']);

            if ($this->bookingModel->updateStatus($id, $status)) {
                header('Location: ' . URLROOT . '/admin/bookings');
                exit;
            }

            die('Failed to update booking');
        }

        $this->view('admin/booking_form', ['booking' => $booking]);
    }

    public function delete_booking($id)
    {
        $this->requireAdmin();

        if ($this->bookingModel->deleteBooking($id)) {
            header('Location: ' . URLROOT . '/admin/bookings');
            exit;
        }

        die('Failed to delete booking');
    }

}