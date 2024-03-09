<?php

require_once 'UserManager.php';
require_once 'HotelManager.php';

// Simple router logic
$action = $_GET['action'] ?? 'home';

$userManager = new UserManager();
$hotelManager = new HotelManager();

switch ($action) {
    case 'register':
        // Example: Process registration
        $username = $_POST['username'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if ($username && $email && $password) {
            $result = $userManager->registerUser($username, $email, $password);
            if ($result) {
                echo "Registration successful. Please log in.";
            } else {
                echo "Registration failed. Please try again.";
            }
        } else {
            echo "Please fill in all required fields.";
        }
        break;
    case 'login':
        // Example: Process login
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if ($email && $password) {
            $result = $userManager->loginUser($email, $password);
            if ($result) {
                echo "Login successful. Welcome back!";
            } else {
                echo "Login failed. Please check your credentials.";
            }
        } else {
            echo "Please fill in all required fields.";
        }
        break;
    case 'searchHotels':
        // Example: Process hotel search
        $searchInput = $_GET['searchInput'] ?? $_POST['searchInput'] ?? null;

        if ($searchInput) {
            $hotels = $hotelManager->searchHotels($searchInput);
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
