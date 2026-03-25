<?php

class Contact extends Controller
{
    public function index()
    {
        $this->view('contact/index');
    }

    public function send()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $subject = trim($_POST['subject']);
            $message = trim($_POST['message']);

            $contactModel = $this->model('Contact');
            $contactModel->addMessage($name, $email, $subject, $message);

            header('Location: ' . URLROOT . '/contact/success');
            exit;
        }

        header('Location: ' . URLROOT . '/contact');
        exit;
    }

    public function success()
    {
        $this->view('contact/success');
    }
}