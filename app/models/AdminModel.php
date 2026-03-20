<?php

class AdminModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function login($username, $password) {
        $this->db->query("SELECT * FROM admins WHERE username = :username");
        $this->db->bind(':username', $username);
        $admin = $this->db->single();

        if($admin && password_verify($password, $admin->password)) {
            return $admin;
        } else {
            return false;
        }
    }

    public function getAllAdmins() {
        $this->db->query("SELECT * FROM admins");
        return $this->db->resultSet();
    }
}