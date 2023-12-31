<?
require 'database.php';

function addUserHandler() {
    $user = new User($_POST['first_name'], $_POST['last_name'], 
                     $_POST['email'], $_POST['company_name'],
                     $_POST['position']);
    $user->setPhoneNumbers($_POST['phone_numbers']);
    $userId = Database::addUser($user);
    $user->setId($userId);
    Database::addUserPhoneNumbers($user->getId(), $user->getPhoneNumbers());

    header('Location: localhost');
    exit();
}

function updateUserHandler() {
    $user = new User($_POST['first_name'], $_POST['last_name'], 
                     $_POST['email'], $_POST['company_name'],
                     $_POST['position']);
    $user->setId($_POST['id']);
    $oldPhoneNumbers = Database::getUserPhoneNumbers($user->getId());
    $newPhoneNumbers = array();
    foreach ($oldPhoneNumbers as $index => $oldPhoneNumber) {
        /** @var Phonenumber $oldPhoneNumber */
        $newPhoneNumber = new PhoneNumber($oldPhoneNumber->getId(), $_POST['phone_numbers'][$index]);
        $newPhoneNumbers[] = $newPhoneNumber;
    }
    $user->setPhoneNumbers($newPhoneNumbers);

    Database::updateUser($user);
    Database::updateUserPhoneNumbers($user->getPhoneNumbers());

    header('Location: localhost');
    exit();
}

function deleteUserHandler() {
    Database::deleteUser($_POST['id']);

    header('Location: localhost');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $operation = $_POST['operation'];
    switch ($operation) {
        case 'add':
            addUserHandler();
            break;
        case 'delete':
            deleteUserHandler();           
            break;
        case 'update':
            updateUserHandler();
        default:
            header('Location: localhost');
            exit();
    }
}