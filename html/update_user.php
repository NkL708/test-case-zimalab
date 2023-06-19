<?
require "scripts/database.php";
$id = $_GET['id'];
$user = Database::getUser($id);
?>

<h1>Изменить пользователя</h1>
<form action="scripts/handlers.php" method="POST">
    <input type="hidden" name="operation" value="update">
    <input type="hidden" value="<?= $id ?>" name="id">
    <input type="text" class="form-control mb-2" placeholder="Имя" value="<?= $user->getFirstName() ?>" name="first_name">
    <input type="text" class="form-control mb-2" placeholder="Фамилия" value="<?= $user->getLastName() ?>" name="last_name">
    <input type="email" class="form-control mb-2" placeholder="Почта" value="<?= $user->getEmail() ?>" name="email">
    <input type="text" class="form-control mb-2" placeholder="Компания" value="<?= $user->getCompanyName() ?>" name="company_name">
    <input type="text" class="form-control mb-2" placeholder="Позиция" value="<?= $user->getPosition() ?>" name="position">

    <button type="submit" class="btn btn-success" action="scripts">Изменить</button>
</form>
