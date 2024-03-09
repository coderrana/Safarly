<?php

class Booking
{
    public $hotelId;
    public $userId;
    public $checkInDate;
    public $checkOutDate;

    private function __construct()
    {
        // Private constructor to enforce the use of the builder
    }

    public static function create()
    {
        return new self();
    }

    public function setHotelId($hotelId)
    {
        $this->hotelId = $hotelId;
        return $this;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function setCheckInDate($checkInDate)
    {
        $this->checkInDate = $checkInDate;
        return $this;
    }

    public function setCheckOutDate($checkOutDate)
    {
        $this->checkOutDate = $checkOutDate;
        return $this;
    }

    public function build()
    {
        return $this;
    }
}

// Usage:
try {
    // Retrieve form data and validate it
    $hotelId = $_POST['hotelId'] ?? null;
    $userId = 1;
    $checkInDate = $_POST['checkInDate'] ?? null;
    $checkOutDate = $_POST['checkOutDate'] ?? null;

    if (empty($hotelId) || empty($checkInDate) || empty($checkOutDate)) {
        throw new Exception("Please fill in all required fields.");
    }

    // Use the builder methods to construct the Booking object
    $booking = Booking::create()
        ->setHotelId($hotelId)
        ->setUserId($userId)
        ->setCheckInDate($checkInDate)
        ->setCheckOutDate($checkOutDate)
        ->build();

    // Add the booking to the BookingManager
    $bookingManager->addBooking($booking);

    // Redirect or display a success message
    echo 'Booking successful!';
} catch (Exception $e) {
    // Handle the error gracefully
    echo 'Error: ' . $e->getMessage();
}
