<?php

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

<<<<<<< HEAD
    public function addTravelBlog(TravelBlog $blog) {
        $this->travelBlogs[] = $blog;
    }

    public function getTravelBlogs() {
        return $this->travelBlogs;
    }
=======
public function getDynamicPrice(Book $book) {
    $bookingManager = new BookingManager();
    return $bookingManager->calculateDynamicPrice($book);
}
>>>>>>> 29bb44b9c6671331d2202cd1e5b3f026bb116c6f

}
