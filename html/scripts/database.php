<?
require 'user.php';

class Database {
    public static mysqli $connection;

    public static function connect() {
        self::$connection = new mysqli('mysql', 'root', 'root', 'mydatabase');
        if (self::$connection->connect_error) {
            die('Connection failed: ' . self::$connection->connect_error);
        }
    }

    public static function getUsers() {
        self::connect();
        $query = "SELECT * FROM users";

        $result = self::$connection->query($query);
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $user = new User($row['first_name'], $row['last_name'], 
                             $row['email'], $row['company_name'], 
                             $row['position']);
            $user->setId($row['id']);
            $users[] = $user;
        }

        self::$connection->close();
        return $users;
    }

    public static function getUser($id) {
        self::connect();
        
        $query = "SELECT * FROM users 
                  WHERE id='$id'";
        $result = self::$connection->query($query);
        $row = $result->fetch_assoc();

        self::$connection->close();

        if ($row) {
            $user = new User($row['first_name'], $row['last_name'], 
                             $row['email'], $row['company_name'], 
                             $row['position']);
            return $user;
        }
        return null;
    }

    public static function addUser(User $user) {
        self::connect();

        $query = "INSERT INTO 
                  users(first_name, last_name, email, 
                  company_name, position) VALUES(
                  '{$user->getFirstName()}', 
                  '{$user->getLastName()}', 
                  '{$user->getEmail()}', 
                  '{$user->getCompanyName()}', 
                  '{$user->getPosition()}')";
        self::$connection->query($query);
        $userId = self::$connection->insert_id;

        self::$connection->close();
        return $userId;
    }

    public static function updateUser(User $user) {
        self::connect();

        $query = "UPDATE users SET 
                  first_name='{$user->getFirstName()}', 
                  last_name='{$user->getLastName()}', 
                  email='{$user->getEmail()}', 
                  company_name='{$user->getCompanyName()}', 
                  position='{$user->getPosition()}'
                  WHERE id={$user->getId()}";
        self::$connection->query($query);

        self::$connection->close();
    }
    
    public static function deleteUser($id) {
        self::connect();

        $query = "DELETE FROM users 
                  WHERE id=$id";
        self::$connection->query($query);

        self::$connection->close();
    }

    public static function addUserPhoneNumbers($id, $phoneNumbers) {
        self::connect();
        
        // One insert is better?
        foreach ($phoneNumbers as $phoneNumber) {
            $query = "INSERT INTO phone_numbers(number, user_id)  
                      VALUES('$phoneNumber', $id)";
            self::$connection->query($query);    
        }
        
        self::$connection->close();
    }
    
    public static function deleteUserPhoneNumbers($userId) {
        self::connect();

        $query = "DELETE FROM phone_numbers
                  WHERE user_id=$userId";
        self::$connection->query($query);

        self::$connection->close();
    }

    public static function updateUserPhoneNumbers($phoneNumbers) {
        self::connect();

        foreach ($phoneNumbers as $phoneNumber) {
            /** @var PhoneNumber $phoneNumber */
            $query = "UPDATE phone_numbers 
                      SET number = '{$phoneNumber->getNumber()}'
                      WHERE id={$phoneNumber->getId()}"; 
            self::$connection->query($query);
        }
    
        self::$connection->close();
    }

    public static function getUserPhoneNumbers($userId) {
        self::connect();
        
        $query = "SELECT * FROM phone_numbers 
                  WHERE user_id=$userId";
        $result = self::$connection->query($query);
        $phoneNumbers = array();
        while ($row = $result->fetch_assoc()) {
            $phoneNumber = new PhoneNumber($row['id'], $row['number']);
            $phoneNumbers[] = $phoneNumber;
        }
        
        self::$connection->close();
        return $phoneNumbers;
    }
}