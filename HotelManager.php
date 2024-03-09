<?php

require_once 'Hotel.php';

class HotelManager {
    private $hotels;
    private $travelBlogManager;

    public function __construct(TravelBlogManager $travelBlogManager) {
        $this->hotels = [
            new Hotel("Hotel Corantia", "City Tripoli", "70$ - 150$"),
            new Hotel("Hotel Safwa", "City Benghazi", "120$"),
            // Add more hotels as needed
        ];
        $this->travelBlogManager = $travelBlogManager;
    }

    public function searchHotels($searchInput) {
        $filteredHotels = array_filter($this->hotels, function ($hotel) use ($searchInput) {
            return stripos($hotel->name, $searchInput) !== false || stripos($hotel->location, $searchInput) !== false;
        });

        return array_values($filteredHotels);
    }

    public function addTravelBlog(TravelBlog $blog) {
        $this->travelBlogManager->addTravelBlog($blog);
    }

    public function getTravelBlogs() {
        return $this->travelBlogManager->getTravelBlogs();
    }

    public function bookRoomFacade($hotelName, $userId, $checkInDate, $checkOutDate) {
        try {
            // Find the hotel by name
            $hotel = $this->findHotelByName($hotelName);

            // Create a new Booking object
            $booking = new Booking($hotel->name, $userId, $checkInDate, $checkOutDate);

            // Add the booking to the BookingManager
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

    private function findHotelByName($hotelName) {
        foreach ($this->hotels as $hotel) {
            if ($hotel->name === $hotelName) {
                return $hotel;
            }
        }
        throw new Exception("Hotel not found: $hotelName");
    }
}
