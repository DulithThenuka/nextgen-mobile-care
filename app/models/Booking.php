<?php

class Booking {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addBooking($customer_name, $phone, $device_type, $issue, $booking_date) {
        $this->db->query("INSERT INTO bookings (customer_name, phone, device_type, issue, booking_date) 
                          VALUES (:customer_name, :phone, :device_type, :issue, :booking_date)");

        $this->db->bind(':customer_name', $customer_name);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':device_type', $device_type);
        $this->db->bind(':issue', $issue);
        $this->db->bind(':booking_date', $booking_date);

        return $this->db->execute();
    }

    public function getAllBookings() {
        $this->db->query("SELECT * FROM bookings ORDER BY created_at DESC");
        return $this->db->resultSet();
    }
}