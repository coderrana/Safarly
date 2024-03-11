<?php

require_once 'User.php';

class UserManager {
    // Array to store user objects
    private $users = [];

    // Path to the data file for storing user data
    private $dataFile = 'users.dat';

    public function __construct() {
        // Load user data from file on initialization
        $this->loadUsers();
    }

    private function loadUsers() {
        if (file_exists($this->dataFile)) {
            // Attempt to unserialize user data from the file
            $this->users = unserialize(file_get_contents($this->dataFile));
        } else {
            // If file doesn'  t exist, initialize the users array as empty
            $this->users = [];
        }
    }

    public function saveUsers() {
        // Serialize the user data array and write it to the file
        file_put_contents($this->dataFile, serialize($this->users));
    }

    public function registerUserFacade($username, $email, $password) {
        try {
            // Validate user data before registration
            $this->validateUserData($username, $email, $password);

            // Check for existing email
            foreach ($this->users as $user) {
                if ($user->email === $email) {
                    throw new Exception("Email already exists.");
                }
            }

            // Create a new User object and register the user
            $this->users[] = new User($username, $email, $password);
            $this->saveUsers();

            return "User registered successfully!";
        } catch (Exception $e) {
            // Handle registration errors gracefully
            return 'Error: ' . $e->getMessage();
        }
    }

    public function loginUser($email, $password) {
        foreach ($this->users as $user) {
            if ($user->email === $email && password_verify($password, $hashedPassword)) { // Use password_verify for secure comparison
                return "Login successful!";
            }
        }
        return "Invalid email or password!";
    }

    private function validateUserData($username, $email, $password) {
        // Basic validation for empty fields
        if (empty($username) || empty($email) || empty($password)) {
            throw new Exception("Invalid user data provided.");
        }

        // You can add more validation checks as needed (e.g., email format, password strength)
    }
}
