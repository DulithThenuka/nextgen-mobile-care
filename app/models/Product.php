<?php

class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllProducts()
    {
        $this->db->query("SELECT * FROM products ORDER BY id DESC");
        return $this->db->resultSet();
    }

    public function getProducts()
    {
        $this->db->query("SELECT * FROM products ORDER BY id DESC");
        return $this->db->resultSet();
    }

    public function getFeaturedProducts()
    {
        $this->db->query("SELECT * FROM products ORDER BY id DESC LIMIT 4");
        return $this->db->resultSet();
    }

    public function getProductById($id)
    {
        $this->db->query("SELECT * FROM products WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addProduct($name, $description, $price, $image, $category, $stock)
    {
        $this->db->query("INSERT INTO products (name, description, price, image, category, stock) 
                          VALUES (:name, :description, :price, :image, :category, :stock)");
        $this->db->bind(':name', $name);
        $this->db->bind(':description', $description);
        $this->db->bind(':price', $price);
        $this->db->bind(':image', $image);
        $this->db->bind(':category', $category);
        $this->db->bind(':stock', $stock);

        return $this->db->execute();
    }

    public function updateProduct($id, $name, $description, $price, $image, $category, $stock)
    {
        $this->db->query("UPDATE products 
                          SET name = :name, description = :description, price = :price, image = :image, category = :category, stock = :stock 
                          WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);
        $this->db->bind(':description', $description);
        $this->db->bind(':price', $price);
        $this->db->bind(':image', $image);
        $this->db->bind(':category', $category);
        $this->db->bind(':stock', $stock);

        return $this->db->execute();
    }

    public function deleteProduct($id)
    {
        $this->db->query("DELETE FROM products WHERE id = :id");
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

    public function getProductCount()
    {
        $this->db->query("SELECT COUNT(*) as total FROM products");
        $row = $this->db->single();
        return $row->total;
    }

    public function searchAndFilterProducts($search = '', $sort = '', $category = '')
    {
        $sql = "SELECT * FROM products WHERE name LIKE :search";
        $params = [
            ':search' => '%' . $search . '%'
        ];

        if (!empty($category)) {
            $sql .= " AND category = :category";
            $params[':category'] = $category;
        }

        if ($sort === 'price_asc') {
            $sql .= " ORDER BY price ASC";
        } elseif ($sort === 'price_desc') {
            $sql .= " ORDER BY price DESC";
        } else {
            $sql .= " ORDER BY id DESC";
        }

        $this->db->query($sql);

        foreach ($params as $key => $value) {
            $this->db->bind($key, $value);
        }

        return $this->db->resultSet();
    }

    public function reduceStock($id, $quantity)
    {
        $this->db->query("UPDATE products SET stock = stock - :qty WHERE id = :id AND stock >= :qty");
        $this->db->bind(':qty', $quantity);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
    public function getLowStockProducts($limit = 5)
{
    $this->db->query("SELECT * FROM products WHERE stock > 0 AND stock <= :limitStock ORDER BY stock ASC LIMIT :limit");
    $this->db->bind(':limitStock', 5, PDO::PARAM_INT);
    $this->db->bind(':limit', (int)$limit, PDO::PARAM_INT);
    return $this->db->resultSet();
}

public function getOutOfStockCount()
{
    $this->db->query("SELECT COUNT(*) as total FROM products WHERE stock = 0");
    return $this->db->single()->total;
}

public function getLowStockCount()
{
    $this->db->query("SELECT COUNT(*) as total FROM products WHERE stock > 0 AND stock <= 5");
    return $this->db->single()->total;
}
public function getProductsByCategory()
{
    $this->db->query("SELECT category, COUNT(*) as total FROM products GROUP BY category");
    return $this->db->resultSet();
}

}