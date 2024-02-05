

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

    public function registerUser($username, $email, $password) {
        foreach ($this->users as $user) {
            if ($user->email === $email) {
                return "Email already exists.";
            }
        }
        $this->users[] = new User($username, $email, $password);
        $this->saveUsers();
        return "User registered successfully!";
    }

    public function loginUser($email, $password) {
        foreach ($this->users as $user) {
            if ($user->email === $email && $user->password === $password) {
                return "Login successful!";
            }
        }
        return "Invalid email or password!";
    }
}