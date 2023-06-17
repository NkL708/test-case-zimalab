<?
require "user.php";

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
            $users[] = new User($row['id'], $row['first_name'], 
                                $row['last_name'], $row['email'], 
                                $row['company_name'], $row['position']);
        }

        self::$connection->close();
        return $users;
    }

    public static function getUser($id) {
        self::connect();
        
        $query = "SELECT * FROM users WHERE id='$id'";
        $result = self::$connection->query($query);
        $user = $result->fetch_assoc();

        self::$connection->close();
        return $user;
    }

    public static function addUser(User $user) {
        self::connect();

        $query = "INSERT INTO users (
        {$user->getFirstName()}, 
        {$user->getLastName()}, 
        {$user->getEmail()}, 
        {$user->getCompanyName()}, 
        {$user->getPosition()},
        )";
        self::$connection->query($query);

        self::$connection->close();
    }

    public static function updateUser($id, User $user) {
        self::connect();

        $query = "UPDATE users SET 
        first_name={$user->getFirstName()}, 
        last_name={$user->getLastName()}, 
        email={$user->getEmail()}, 
        company_name={$user->getCompanyName()}, 
        position={$user->getPosition()}, 
        WHERE id=$id";
        self::$connection->query($query);

        self::$connection->close();
    }
    
    public static function deleteUser($id) {
        self::connect();

        $query = "DELETE FROM users WHERE id=$id";
        self::$connection->query($query);

        self::$connection->close();
    }
    
}