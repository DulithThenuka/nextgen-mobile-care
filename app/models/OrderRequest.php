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
        $this->db->query("INSERT INTO order_requests (product_id, product_name, customer_name, phone, address, quantity, status) VALUES (:product_id, :product_name, :customer_name, :phone, :address, :quantity, :status)");
        $this->db->bind(':product_id', $productId);
        $this->db->bind(':product_name', $productName);
        $this->db->bind(':customer_name', $customerName);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':address', $address);
        $this->db->bind(':quantity', $quantity);
        $this->db->bind(':status', 'Pending');

        return $this->db->execute();
    }

    public function getAllOrderRequests()
    {
        $this->db->query("SELECT * FROM order_requests ORDER BY id DESC");
        return $this->db->resultSet();
    }

    public function updateStatus($id, $status)
    {
        $this->db->query("UPDATE order_requests SET status = :status WHERE id = :id");
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
}