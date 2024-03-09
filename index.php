<?php

require_once 'UserManager.php';
require_once 'HotelManager.php';

class BookingFacade {
    private $userManager;
    private $hotelManager;

    public function __construct(UserManager $userManager, HotelManager $hotelManager) {
        $this->userManager = $userManager;
        $this->hotelManager = $hotelManager;
    }

    public function registerUserFacade($username, $email, $password) {
        return $this->userManager->registerUserFacade($username, $email, $password);
    }

    public function loginUserFacade($email, $password) {
        return $this->userManager->loginUser($email, $password);
    }

    public function searchHotelsFacade($searchInput) {
        return $this->hotelManager->searchHotels($searchInput);
    }
}

// Simple router logic
$action = $_GET['action'] ?? 'home';

$userManager = new UserManager();
$hotelManager = new HotelManager();
$bookingFacade = new BookingFacade($userManager, $hotelManager);

switch ($action) {
    case 'register':
        // Example: Process registration
        $username = $_POST['username'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if ($username && $email && $password) {
            $result = $bookingFacade->registerUserFacade($username, $email, $password);
            echo $result;
        } else {
            echo "Please fill in all required fields.";
        }
        break;
    case 'login':
        // Example: Process login
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if ($email && $password) {
            $result = $bookingFacade->loginUserFacade($email, $password);
            echo $result;
        } else {
            echo "Please fill in all required fields.";
        }
        break;
    case 'searchHotels':
        // Example: Process hotel search
        $searchInput = $_GET['searchInput'] ?? $_POST['searchInput'] ?? null;

        if ($searchInput) {
            $hotels = $bookingFacade->searchHotelsFacade($searchInput);
            if (!empty($hotels)) {
                foreach ($hotels as $hotel) {
                    // $hotel is an array or object with accessible properties. Adjust as necessary.
                    echo "Hotel Name: " . $hotel->name . "<br>";
                    echo "Location: " . $hotel->location . "<br>";
                    echo "Price: " . $hotel->price . "<br><br>";
                }
            } else {
                echo "No hotels found matching your search criteria.";
            }
        } else {
            echo "Please enter search criteria.";
        }
        break;
    default:
        echo "Welcome to our hotel booking site!";
        break;
}

?>
