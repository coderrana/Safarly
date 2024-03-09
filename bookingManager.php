<?php
// design pattern applied

class BookingManager {
    private $bookings = [];

    public function addBooking($booking) {
        if (!$booking instanceof Booking) {
            throw new Exception("Invalid booking object.");
        }
        $this->bookings[] = $booking;
    }

    public function getBookings() {
        return $this->bookings;
    }

    public function bookRoom($hotelId, $userId, $checkInDate, $checkOutDate) {
        try {
            // Create a new Booking object
            $booking = new Booking($hotelId, $userId, $checkInDate, $checkOutDate);

            // Add the booking to the BookingManager
            $this->addBooking($booking);

            // Additional booking logic...

            // Display success message or redirect
            return 'Booking successful!';
        } catch (Exception $e) {
            // Handle the error gracefully
            return 'Error: ' . $e->getMessage();
        }
    }

    public function calculateDynamicPrice(Book $book) {
        // Your existing dynamic pricing logic goes here
        $baseRate = $this->getBaseRate();
        $duration = $this->calculateDuration($book->getCheckInDate(), $book->getCheckOutDate());
        $finalPrice = $baseRate * $duration;
        $finalPrice = $this->applyPromotions($finalPrice);

        return $finalPrice;
    }

    private function getBaseRate() {
        // Your existing base rate retrieval logic goes here
        return 100; // Example base rate
    }

    private function calculateDuration($checkInDate, $checkOutDate) {
        // Your existing duration calculation logic goes here
        $startDate = new DateTime($checkInDate);
        $endDate = new DateTime($checkOutDate);
        $interval = $startDate->diff($endDate);

        return $interval->days;
    }

    private function applyPromotions($price) {
        // Your existing promotion or discount logic goes here
        $discountPercentage = 10; // Example discount
        $discount = ($discountPercentage / 100) * $price;

        return $price - $discount;
    }
}
