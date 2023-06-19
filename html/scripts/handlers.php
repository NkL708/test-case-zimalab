<?
require 'database.php';

function addUserHandler() {
    $user = new User($_POST['first_name'], $_POST['last_name'], 
                     $_POST['email'], $_POST['company_name'],
                     $_POST['position']);
    Database::addUser($user);

    header('Location: localhost');
    exit();
}

function updateUserHandler() {
    $user = new User($_POST['first_name'], $_POST['last_name'], 
                     $_POST['email'], $_POST['company_name'],
                     $_POST['position']);
    $user->setId($_POST['id']);
    Database::updateUser($user);
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