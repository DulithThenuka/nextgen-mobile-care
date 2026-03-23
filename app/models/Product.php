<?php

class Product {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllProducts() {
        $this->db->query("SELECT * FROM products ORDER BY created_at DESC");
        return $this->db->resultSet();
    }

    public function getProductById($id) {
        $this->db->query("SELECT * FROM products WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addProduct($name, $description, $price, $image) {
        $this->db->query('INSERT INTO products (name, price, description, image) 
                  VALUES (:name, :price, :description, :image)');
$this->db->bind(':name', $data['name']);
$this->db->bind(':price', $data['price']);
$this->db->bind(':description', $data['description']);
$this->db->bind(':image', $data['image']);
        return $this->db->execute();
    }

    public function updateProduct($id, $name, $description, $price, $image) {
        $this->db->query("UPDATE products SET name = :name, description = :description, price = :price, image = :image WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);
        $this->db->bind(':description', $description);
        $this->db->bind(':price', $price);
        $this->db->bind(':image', $image);

        return $this->db->execute();
    }

    public function deleteProduct($id) {
        $this->db->query("DELETE FROM products WHERE id = :id");
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
    public function getFeaturedProducts(){
    $this->db->query('SELECT * FROM products ORDER BY id DESC LIMIT 4');
    return $this->db->resultSet();
    }
    public function getProducts(){
    $this->db->query("SELECT * FROM products ORDER BY id DESC");
    return $this->db->resultSet();
}public function getProductCount()
{
    $this->db->query("SELECT COUNT(*) as total FROM products");
    $row = $this->db->single();
    return $row->total;
}

}