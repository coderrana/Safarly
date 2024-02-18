<?php

use PHPUnit\Framework\TestCase;

require_once 'C:\Users\dell\Desktop\github\Safarly\Hotel.php';

class HotelTest extends TestCase {
    public function testHotelCanReceiveARating() {
        $hotel = new Hotel();
        $hotel->addRating(4);
        $this->assertEquals([4], $hotel->ratings);
    }

    public function testAddingInvalidRatingThrowsException() {
        $this->expectException(Exception::class);
        $hotel = new Hotel();
        $hotel->addRating(6); // Invalid rating, should throw an exception.
    }

    public function testCalculateAverageRating() {
        $hotel = new Hotel();
        $hotel->addRating(5);
        $hotel->addRating(3);
        $this->assertEquals(4, $hotel->getAverageRating());
    }

    public function testAverageRatingReturnsMessageWhenNoRatings() {
        $hotel = new Hotel();
        $this->assertEquals('Not rated yet', $hotel->getAverageRating());
    }
}