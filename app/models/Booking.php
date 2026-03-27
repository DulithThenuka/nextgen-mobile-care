<?php

class Booking
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function createBooking($data)
    {
        $this->db->query('INSERT INTO bookings (customer_name, email, phone, device_model, issue_description, service_type, booking_date, status) 
                          VALUES (:customer_name, :email, :phone, :device_model, :issue_description, :service_type, :booking_date, :status)');

        $this->db->bind(':customer_name', $data['customer_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':device_model', $data['device_model']);
        $this->db->bind(':issue_description', $data['issue_description']);
        $this->db->bind(':service_type', $data['service_type']);
        $this->db->bind(':booking_date', $data['booking_date']);
        $this->db->bind(':status', $data['status']);

        return $this->db->execute();
    }

    public function getAllBookings()
    {
        $this->db->query('SELECT * FROM bookings ORDER BY id DESC');
        return $this->db->resultSet();
    }

    public function getBookingById($id)
    {
        $this->db->query('SELECT * FROM bookings WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateStatus($id, $status)
    {
        $this->db->query('UPDATE bookings SET status = :status WHERE id = :id');
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
    public function getBookingCount()
{
    $this->db->query("SELECT COUNT(*) as total FROM bookings");
    $row = $this->db->single();
    return $row->total;
}

public function getTotalBookings() {
    $this->db->query("SELECT COUNT(*) as total FROM bookings");
    $row = $this->db->single();
    return $row->total;
}

public function getRecentBookings($limit = 5) {
    $this->db->query("SELECT * FROM bookings ORDER BY id DESC LIMIT $limit");
    return $this->db->resultSet();
}
public function getBookingStatusCounts()
{
    $this->db->query("SELECT status, COUNT(*) as total FROM bookings GROUP BY status");
    return $this->db->resultSet();
}

public function getMonthlyBookings()
{
    $this->db->query("
        SELECT 
            YEAR(created_at) as year_num,
            MONTH(created_at) as month_num,
            DATE_FORMAT(MIN(created_at), '%b %Y') as month_label,
            COUNT(*) as total
        FROM bookings
        WHERE created_at >= DATE_SUB(NOW(), INTERVAL 5 MONTH)
        GROUP BY YEAR(created_at), MONTH(created_at)
        ORDER BY YEAR(created_at), MONTH(created_at)
    ");
    return $this->db->resultSet();
}
}