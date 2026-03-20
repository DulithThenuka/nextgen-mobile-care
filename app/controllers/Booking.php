<?php

class Booking extends Controller {

    public function index() {
        $this->view('booking/form');
    }

    public function store() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customer_name = trim($_POST['customer_name']);
            $phone = trim($_POST['phone']);
            $device_type = trim($_POST['device_type']);
            $issue = trim($_POST['issue']);
            $booking_date = trim($_POST['booking_date']);

            $bookingModel = $this->model('Booking');

            if($bookingModel->addBooking($customer_name, $phone, $device_type, $issue, $booking_date)) {
                $this->view('booking/form', ['success' => 'Your repair booking has been submitted successfully.']);
            } else {
                $this->view('booking/form', ['error' => 'Something went wrong. Please try again.']);
            }
        } else {
            header('Location: /nextgen-mobile-care/public/booking');
            exit;
        }
    }
}