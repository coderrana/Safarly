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
        // You would retrieve $_POST['username'], $_POST['email'], $_POST['password'] here
        break;
    case 'login':
        // Example: Process login
        // You would retrieve $_POST['email'], $_POST['password'] here
        break;
    case 'searchHotels':
        // Example: Process hotel search
        // You would retrieve $_GET['searchInput'] or $_POST['searchInput'] here
        break;
    default:
        echo "Welcome to our hotel booking site!";
        break;
}