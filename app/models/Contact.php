<?php

class Contact
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addMessage($name, $email, $subject, $message)
    {
        $this->db->query("INSERT INTO contact_messages (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':subject', $subject);
        $this->db->bind(':message', $message);

        return $this->db->execute();
    }

    public function getAllMessages()
    {
        $this->db->query("SELECT * FROM contact_messages ORDER BY id DESC");
        return $this->db->resultSet();
    }
    public function getTotalMessages()
{
    $this->db->query("SELECT COUNT(*) as total FROM contact_messages");
    $row = $this->db->single();
    return $row->total;
}

public function getRecentMessages($limit = 5)
{
    $sql = "SELECT * FROM contact_messages ORDER BY id DESC LIMIT " . (int)$limit;
    $this->db->query($sql);
    return $this->db->resultSet();
}
public function getMonthlyMessages()
{
    $this->db->query("
        SELECT 
            YEAR(created_at) as year_num,
            MONTH(created_at) as month_num,
            DATE_FORMAT(MIN(created_at), '%b %Y') as month_label,
            COUNT(*) as total
        FROM contact_messages
        WHERE created_at >= DATE_SUB(NOW(), INTERVAL 5 MONTH)
        GROUP BY YEAR(created_at), MONTH(created_at)
        ORDER BY YEAR(created_at), MONTH(created_at)
    ");
    return $this->db->resultSet();
}
}