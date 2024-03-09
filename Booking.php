<?php
class Booking {


    public $hotelId;
    public $userId;
    public $checkInDate;
    public $checkOutDate;

    public function __construct($hotelId, $userId, $checkInDate, $checkOutDate) {
        if (empty($hotelId) || empty($userId) || empty($checkInDate) || empty($checkOutDate)) {
            throw new Exception("Invalid booking details provided.");
        }

        $this->hotelId = $hotelId;
        $this->userId = $userId;
        $this->checkInDate = $checkInDate;
        $this->checkOutDate = $checkOutDate;
    }

    public function getCheckInDate() {
        return $this->checkInDate;
    }

    public function getCheckOutDate() {
        return $this->checkOutDate;
    }
}
