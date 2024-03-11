<?php
class BookingManager {
    // Array to store Booking objects
    private $bookings = [];

    public function addBooking(Booking $booking) {
        // Ensure the provided object is a Booking instance
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
            // Create a Booking object
            $booking = new Booking($hotelId, $userId, $checkInDate, $checkOutDate);

            // Add the booking to the manager (Facade Pattern)
            $this->addBooking($booking);

            // Additional booking logic... (e.g., sending notifications, updating hotel availability)

            // Display success message or redirect
            return 'Booking successful!';
        } catch (Exception $e) {
            // Handle the error gracefully
            return 'Error: ' . $e->getMessage();
        }
    }

    public function calculateDynamicPrice(Booking $book) {
        $baseRate = $this->getBaseRate();
        $duration = $this->calculateDuration($book->getCheckInDate(), $book->getCheckOutDate());
    
        // Apply discount based on duration
        if ($duration > 7) {
            $discountPercentage = 10;
            $discount = ($discountPercentage / 100) * $baseRate;
            $baseRate -= $discount; // Apply discount to base rate
        }
    
        $finalPrice = $baseRate * $duration;
    
        // Apply other promotions (optional)
        $finalPrice = $this->applyPromotions($finalPrice);
    
        return $finalPrice;
    }
    

    private function calculateDuration($checkInDate, $checkOutDate) {
        // (Strategy Pattern) Replace with your logic to calculate duration
        $startDate = new DateTime($checkInDate);
        $endDate = new DateTime($checkOutDate);
        $interval = $startDate->diff($endDate);

        return $interval->days;
    }

    private function applyPromotions($price) {
        // (Strategy Pattern) Replace with your logic to apply promotions
        $discountPercentage = 10; // Example discount
        $discount = ($discountPercentage / 100) * $price;

        return $price - $discount;
    }
}
