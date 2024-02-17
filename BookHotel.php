include 'Booking.php';
include 'BookingManager.php';

$bookingManager = new BookingManager();

try {
    // Retrieve form data and validate it
    $hotelId = $_POST['hotelId'] ?? null;
    $userId = 1; // Assuming you have a way to identify the user, e.g., from session
    $checkInDate = $_POST['checkInDate'] ?? null;
    $checkOutDate = $_POST['checkOutDate'] ?? null;

    if (empty($hotelId) || empty($checkInDate) || empty($checkOutDate)) {
        throw new Exception("Please fill in all required fields.");
    }
