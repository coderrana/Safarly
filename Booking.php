<?php
class Booking {

// Hotel ID associated with the booking
public $hotelId;

// User ID who made the booking
public $userId;

// Check-in date for the booking (format can be adjusted as needed)
public $checkInDate;

// Check-out date for the booking (format can be adjusted as needed)
public $checkOutDate;

public function __construct($hotelId, $userId, $checkInDate, $checkOutDate) {
    // Validate booking details upon object creation
    if (empty($hotelId) || empty($userId) || empty($checkInDate) || empty($checkOutDate)) {
        throw new Exception("Invalid booking details provided.");
    }

    $this->hotelId = $hotelId;
    $this->userId = $userId;
    $this->checkInDate = $checkInDate;
    $this->checkOutDate = $checkOutDate;
}

public function getCheckInDate() {
    return $this->checkInDate;
}

public function getCheckOutDate() {
    return $this->checkOutDate;
}
}
