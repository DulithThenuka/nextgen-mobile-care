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
}