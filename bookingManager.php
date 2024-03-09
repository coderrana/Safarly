<?php

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
}

public function calculateDynamicPrice(Book $book) {
    $baseRate = $this->getBaseRate(); // Replace with your actual base rate logic
    $duration = $this->calculateDuration($book->getCheckInDate(), $book->getCheckOutDate());

    // You can add more factors and adjust the pricing logic as needed
    $finalPrice = $baseRate * $duration;

    // Apply any ongoing promotions or discounts
    $finalPrice = $this->applyPromotions($finalPrice);

    return $finalPrice;
}

private function getBaseRate() {
    // Replace with your actual base rate retrieval logic
    return 100; // Example base rate
}

private function calculateDuration($checkInDate, $checkOutDate) {
    // Replace with your actual duration calculation logic
    $startDate = new DateTime($checkInDate);
    $endDate = new DateTime($checkOutDate);
    $interval = $startDate->diff($endDate);

    return $interval->days;
}

private function applyPromotions($price) {
    // Replace with your actual promotion or discount logic
    $discountPercentage = 10; // Example discount
    $discount = ($discountPercentage / 100) * $price;

    return $price - $discount;
}

}
