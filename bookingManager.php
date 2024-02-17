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