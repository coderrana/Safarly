<?php

use PHPUnit\Framework\TestCase;

require_once 'Hotel.php';

class HotelTest extends TestCase {
  //This test ensures that a Hotel object can receive a rating
  // and store it correctly.
    public function testHotelCanReceiveARating() {
        $hotel = new Hotel();
        $hotel->addRating(4);
        $this->assertEquals([4], $hotel->ratings);
    }

   // This test checks that the Hotel class properly throws
   // an exception when an invalid rating is added.
    public function testAddingInvalidRatingThrowsException() {
        $this->expectException(Exception::class);
        $hotel = new Hotel();
        $hotel->addRating(6); // Invalid rating, should throw an exception.
    }
   // This test verifies the functionality
   // to calculate the average rating of a hotel
    public function testCalculateAverageRating() {
        $hotel = new Hotel();
        $hotel->addRating(5);
        $hotel->addRating(3);
        $this->assertEquals(4, $hotel->getAverageRating());
    }
  // This test ensures that if no ratings have been added to a hotel, the getAverageRating method
  // returns a specific message ("Not rated yet") instead of a numerical average.
    public function testAverageRatingReturnsMessageWhenNoRatings() {
        $hotel = new Hotel();
        $this->assertEquals('Not rated yet', $hotel->getAverageRating());
    }
}
