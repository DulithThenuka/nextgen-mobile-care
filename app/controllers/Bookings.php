<?php

class Bookings extends Controller
{
    public function index()
    {
        $data = [
            'customer_name' => '',
            'email' => '',
            'phone' => '',
            'device_model' => '',
            'issue_description' => '',
            'service_type' => '',
            'booking_date' => '',
            'customer_name_err' => '',
            'email_err' => '',
            'phone_err' => '',
            'device_model_err' => '',
            'issue_description_err' => '',
            'service_type_err' => '',
            'booking_date_err' => ''
        ];

        $this->view('booking/form', $data);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            $data = [
                'customer_name' => trim($_POST['customer_name']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone']),
                'device_model' => trim($_POST['device_model']),
                'issue_description' => trim($_POST['issue_description']),
                'service_type' => trim($_POST['service_type']),
                'booking_date' => trim($_POST['booking_date']),
                'status' => 'Pending',
                'customer_name_err' => '',
                'email_err' => '',
                'phone_err' => '',
                'device_model_err' => '',
                'issue_description_err' => '',
                'service_type_err' => '',
                'booking_date_err' => ''
            ];

            if (empty($data['customer_name'])) {
                $data['customer_name_err'] = 'Please enter your name';
            }

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter your email';
            }

            if (empty($data['phone'])) {
                $data['phone_err'] = 'Please enter your phone number';
            }

            if (empty($data['device_model'])) {
                $data['device_model_err'] = 'Please enter device model';
            }

            if (empty($data['issue_description'])) {
                $data['issue_description_err'] = 'Please describe the issue';
            }

            if (empty($data['service_type'])) {
                $data['service_type_err'] = 'Please select service type';
            }

            if (empty($data['booking_date'])) {
                $data['booking_date_err'] = 'Please select booking date';
            }

            if (
                empty($data['customer_name_err']) &&
                empty($data['email_err']) &&
                empty($data['phone_err']) &&
                empty($data['device_model_err']) &&
                empty($data['issue_description_err']) &&
                empty($data['service_type_err']) &&
                empty($data['booking_date_err'])
            ) {
                $bookingModel = $this->model('Booking');

                if ($bookingModel->createBooking($data)) {
                    header('Location: ' . URLROOT . '/bookings/success');
                    exit;
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('booking/form', $data);
            }
        } else {
            $data = [
                'customer_name' => '',
                'email' => '',
                'phone' => '',
                'device_model' => '',
                'issue_description' => '',
                'service_type' => '',
                'booking_date' => '',
                'customer_name_err' => '',
                'email_err' => '',
                'phone_err' => '',
                'device_model_err' => '',
                'issue_description_err' => '',
                'service_type_err' => '',
                'booking_date_err' => ''
            ];

            $this->view('booking/form', $data);
        }
    }

    public function success()
    {
        $this->view('booking/success');
    }

    public function admin()
    {
        $bookingModel = $this->model('Booking');
        $bookings = $bookingModel->getAllBookings();

        $data = [
            'bookings' => $bookings
        ];

        $this->view('booking/admin_index', $data);
    }

    public function updateStatus($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $status = trim($_POST['status']);

            $bookingModel = $this->model('Booking');

            if ($bookingModel->updateStatus($id, $status)) {
                header('Location: ' . URLROOT . '/bookings/admin');
                exit;
            } else {
                die('Failed to update booking status');
            }
        } else {
            header('Location: ' . URLROOT . '/bookings/admin');
            exit;
        }
    }
}