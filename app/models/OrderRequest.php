<?php

class OrderRequest
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addOrderRequest($productId, $productName, $customerName, $phone, $address, $quantity)
    {
        $this->db->query("INSERT INTO order_requests (product_id, product_name, customer_name, phone, address, quantity, status) 
                          VALUES (:product_id, :product_name, :customer_name, :phone, :address, :quantity, :status)");
        $this->db->bind(':product_id', $productId);
        $this->db->bind(':product_name', $productName);
        $this->db->bind(':customer_name', $customerName);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':address', $address);
        $this->db->bind(':quantity', $quantity);
        $this->db->bind(':status', 'Pending');

        return $this->db->execute();
    }

    public function createOrderRequest($data)
    {
        $this->db->query('INSERT INTO order_requests (product_id, product_name, customer_name, phone, address, quantity, status) 
                          VALUES (:product_id, :product_name, :customer_name, :phone, :address, :quantity, :status)');

        $this->db->bind(':product_id', $data['product_id']);
        $this->db->bind(':product_name', $data['product_name']);
        $this->db->bind(':customer_name', $data['customer_name']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':status', 'Pending');

        return $this->db->execute();
    }

    public function getAllOrderRequests()
    {
        $this->db->query("SELECT * FROM order_requests ORDER BY id DESC");
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM order_requests WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateStatus($id, $status)
    {
        $this->db->query("UPDATE order_requests SET status = :status WHERE id = :id");
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

    public function deleteOrderRequest($id)
    {
        $this->db->query('DELETE FROM order_requests WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

    public function getTotalOrders()
    {
        $this->db->query("SELECT COUNT(*) as total FROM order_requests");
        $row = $this->db->single();
        return $row ? $row->total : 0;
    }

    public function getOrdersByStatus()
    {
        $this->db->query("SELECT status, COUNT(*) as total FROM order_requests GROUP BY status");
        return $this->db->resultSet();
    }

    public function getOrderStatusCounts()
    {
        $this->db->query("SELECT status, COUNT(*) as total FROM order_requests GROUP BY status");
        return $this->db->resultSet();
    }

    public function getRecentOrders($limit = 5)
    {
        $limit = (int) $limit;
        $this->db->query("SELECT * FROM order_requests ORDER BY created_at DESC LIMIT $limit");
        return $this->db->resultSet();
    }

    public function getMonthlyOrders()
    {
        $this->db->query("
            SELECT 
                YEAR(created_at) as year_num,
                MONTH(created_at) as month_num,
                DATE_FORMAT(MIN(created_at), '%b %Y') as month_label,
                COUNT(*) as total
            FROM order_requests
            WHERE created_at >= DATE_SUB(NOW(), INTERVAL 5 MONTH)
            GROUP BY YEAR(created_at), MONTH(created_at)
            ORDER BY YEAR(created_at), MONTH(created_at)
        ");
        return $this->db->resultSet();
    }
}