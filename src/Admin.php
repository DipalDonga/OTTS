<?php

class Admin
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function authenticate($username, $password)
    {
        return $this->username === $username && $this->password === $password;
    }

    public function manageMovie($movieId)
    {
        // Code to manage movie based on the provided movie ID
        // Example: Update movie details, delete movie, etc.
    }

    public function manageBooking($bookingId)
    {
        // Code to manage booking based on the provided booking ID
        // Example: View booking details, cancel booking, etc.
    }

    public function managePayment($paymentId)
    {
        // Code to manage payment based on the provided payment ID
        // Example: Process payment, refund payment, etc.
    }
}
