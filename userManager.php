<?php

require_once 'User.php';

class UserManager {
    private $users = [];
    private $dataFile = 'users.dat';

    public function __construct() {
        $this->loadUsers();
    }

    private function loadUsers() {
        if (file_exists($this->dataFile)) {
            $this->users = unserialize(file_get_contents($this->dataFile));
        } else {
            $this->users = [];
        }
    }

    public function saveUsers() {
        file_put_contents($this->dataFile, serialize($this->users));
    }

    public function registerUserFacade($username, $email, $password) {
        try {
            // Validate user data and perform registration logic
            $this->validateUserData($username, $email, $password);

            // Check if the email already exists
            foreach ($this->users as $user) {
                if ($user->email === $email) {
                    throw new Exception("Email already exists.");
                }
            }

            // Register the user
            $this->users[] = new User($username, $email, $password);
            $this->saveUsers();

            // Display success message
            return "User registered successfully!";
        } catch (Exception $e) {
            // Handle the error gracefully
            return 'Error: ' . $e->getMessage();
        }
    }

    public function loginUser($email, $password) {
        foreach ($this->users as $user) {
            if ($user->email === $email && $user->password === $password) {
                return "Login successful!";
            }
        }
        return "Invalid email or password!";
    }

    private function validateUserData($username, $email, $password) {
        // Implement your validation logic here (e.g., check if the username is unique, validate email format, etc.)
        if (empty($username) || empty($email) || empty($password)) {
            throw new Exception("Invalid user data provided.");
        }

        // You can add more validation checks as needed
    }
}
