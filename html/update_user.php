<?
require "scripts/database.php";
$id = $_GET['id'];
$user = Database::getUser($id);
$phoneNumbers = Database::getUserPhoneNumbers($id);
?>

<h1>Изменить пользователя</h1>
<form action="scripts/handlers.php" method="POST">
    <input type="hidden" name="operation" value="update">
    <input type="hidden" value="<?= $id ?>" name="id">
    <div class="form-group">
        <label for="first-name">Имя:</label>
        <input type="text" id="first-name" class="form-control mb-2" placeholder="Имя" value="<?= $user->getFirstName() ?>" name="first_name">
    </div>

    <div class="form-group">
        <label for="last-name">Фамилия:</label>
        <input type="text" id="last-name" class="form-control mb-2" placeholder="Фамилия" value="<?= $user->getLastName() ?>" name="last_name">
    </div>

    <div class="form-group">
        <label for="email">Почта:</label>
        <input type="email" id="email" class="form-control mb-2" placeholder="Почта" value="<?= $user->getEmail() ?>" name="email">
    </div>

    <div class="form-group">
        <label for="phone-number-1">Номер телефона:</label>
        <input type="text" id="phone-number-1" class="form-control mb-2" placeholder="Номер телефона" value="<?= $phoneNumbers[0]->getNumber() ?>" name="phone_numbers[]">
    </div>

    <div class="form-group">
        <label for="phone-number-2">Рабочий номер телефона:</label>
        <input type="text" id="phone-number-2" class="form-control mb-2" placeholder="Рабочий номер телефона" value="<?= $phoneNumbers[1]->getNumber() ?>" name="phone_numbers[]">
    </div>

    <div class="form-group">
        <label for="phone-number-3">Дополнительный номер телефона:</label>
        <input type="text" id="phone-number-3" class="form-control mb-2" placeholder="Дополнительный номер телефона" value="<?= $phoneNumbers[2]->getNumber() ?>" name="phone_numbers[]">
    </div>

    <div class="form-group">
        <label for="company-name">Компания:</label>
        <input type="text" id="company-name" class="form-control mb-2" placeholder="Компания" value="<?= $user->getCompanyName() ?>" name="company_name">
    </div>

    <div class="form-group">
        <label for="position">Позиция:</label>
        <input type="text" id="position" class="form-control mb-2" placeholder="Позиция" value="<?= $user->getPosition() ?>" name="position">
    </div>

    <button type="submit" class="btn btn-success" action="scripts">Изменить</button>
</form>
