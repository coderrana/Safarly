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

 // Create a new Booking object
 $booking = new Booking($hotelId, $userId, $checkInDate, $checkOutDate);

 // Add the booking to the BookingManager
 $bookingManager->addBooking($booking);

 // Redirect or display a success message
 echo 'Booking successful!';
} catch (Exception $e) {
 // Handle the error gracefully
 echo 'Error: ' . $e->getMessage();
}