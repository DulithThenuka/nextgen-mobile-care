<?php

class AdminModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function login($username, $password) {
        $this->db->query("SELECT * FROM admins WHERE username = :username LIMIT 1");
        $this->db->bind(':username', $username);

        $admin = $this->db->single();

        if ($admin) {
            if (password_verify($password, $admin->password)) {
                return $admin;
            }
        }

        return false;
    }

    public function getAllAdmins() {
        $this->db->query("SELECT * FROM admins ORDER BY id DESC");
        return $this->db->resultSet();
    }

    public function getAdminById($id) {
        $this->db->query("SELECT * FROM admins WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function createAdmin($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->db->query("INSERT INTO admins (username, password) VALUES (:username, :password)");
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $hashedPassword);

        return $this->db->execute();
    }

    public function deleteAdmin($id) {
        $this->db->query("DELETE FROM admins WHERE id = :id");
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
}