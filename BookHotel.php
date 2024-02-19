<?php

include 'Booking.php';
include 'BookingManager.php';

$bookingManager = new BookingManager();

try {
    // Retrieve form data and validate it
    $hotelId = $_POST['hotelId'] ?? null;
    $userId = 1; 
    $checkInDate = $_POST['checkInDate'] ?? null;
    $checkOutDate = $_POST['checkOutDate'] ?? null;

    if (empty($hotelId) || empty($checkInDate) || empty($checkOutDate)) {
        throw new Exception("Please fill in all required fields.");
    }
}