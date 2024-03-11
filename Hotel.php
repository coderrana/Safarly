<?php

// design applied

class Hotel {
    public $name;
    public $location;
    public $price;
    public $ratings = [];
    private $travelBlogs = [];

    public function __construct($name, $location, $price) {
        $this->name = $name;
        $this->location = $location;
        $this->price = $price;
    }

    public function addRating($rating) {
        if ($rating < 1 || $rating > 5) {
            throw new Exception("Rating must be between 1 and 5.");
        }
        $this->ratings[] = $rating;
    }

    public function getAverageRating() {
        if (empty($this->ratings)) {
            return "Not rated yet";
        }
        return round(array_sum($this->ratings) / count($this->ratings), 2);
    }

    public function addTravelBlog(TravelBlog $blog) {
        $this->travelBlogs[] = $blog;
    }

    public function getTravelBlogs() {
        return $this->travelBlogs;
    }

    public function bookRoomFacade($userId, $checkInDate, $checkOutDate) {
        try {
            // (Facade Pattern) Simplified booking process
            $booking = new Booking($this->name, $userId, $checkInDate, $checkOutDate);
            $bookingManager = new BookingManager();
            $bookingManager->addBooking($booking);

            // Additional booking logic...

            // Display success message or redirect
            return 'Booking successful!';
        } catch (Exception $e) {
            // Handle the error gracefully
            return 'Error: ' . $e->getMessage();
        }
    }
}