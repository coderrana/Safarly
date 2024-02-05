<?php

require_once 'Hotel.php';

class HotelManager {
    private $hotels;

    public function __construct() {
        $this->hotels = [
            new Hotel("Hotel Corantia", "City Tripoli", "70$ - 150$"),
            new Hotel("Hotel Safwa", "City Benghazi", "120$"),
            // Add more hotels as needed
        ];
    }

    public function searchHotels($searchInput) {
        $filteredHotels = array_filter($this->hotels, function($hotel) use ($searchInput) {
            return stripos($hotel->name, $searchInput) !== false || stripos($hotel->location, $searchInput) !== false;
        });

        return array_values($filteredHotels);
    }
}
