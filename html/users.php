<?
require "scripts/database.php";
$users = Database::getUsers(); ?>

<h1>Пользователи</h1>
<table class="table table-striped table-bordered">
    <tr class="text-center">
        <th>Id</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Почта</th>
        <th>Компания</th>
        <th>Позиция</th>
        <th>Номер телефона</th>
        <th>Рабочий номер телефона</th>
        <th>Дополнительный номер телефона</th>
        <th colspan="2" class="text-center">Дествия</th>
    </tr>

    <? foreach ($users as $user) : ?>
        <? /** @var User $user */
        $userId = $user->getId(); ?>
        <tr class="text-center align-middle">
            <td><?= $userId ?></td>
            <td><?= $user->getFirstName() ?></td>
            <td><?= $user->getLastName() ?></td>
            <td><?= $user->getEmail() ?></td>
            <td><?= $user->getCompanyName() ?></td>
            <td><?= $user->getPosition() ?></td>
            <?
            $phoneNumbers = Database::getUserPhoneNumbers($userId);
            for ($i = 0; $i < 3; $i++) : ?>
                <td><?= isset($phoneNumbers[$i]) ? $phoneNumbers[$i]->getNumber() : '' ?></td>
            <? endfor ?>
            <td>
                <form action="scripts/handlers.php" method="POST">
                    <input type="hidden" name="operation" value="delete">
                    <input type="hidden" name="id" value="<?= $user->getId() ?>">
                    <button type="submit" class="btn btn-danger">
                        <span class="material-symbols-outlined">delete</span>
                    </button>
                </form>
            </td>
            <td>
                <div class="btn btn-warning d-inline-flex">
                    <a href="?page=update_user&id=<?= $user->getId() ?>" class="text-decoration-none text-black">
                        <span class="material-symbols-outlined">edit</span>
                    </a>
                </div>
            </td>
        </tr>
    <? endforeach ?>
</table>
<div class="btn btn-info">
    <a href="?page=add_user" class="text-decoration-none text-black d-flex">
        Добавить пользователя
        <span class="material-symbols-outlined" style="margin-left: 5px;">add</span>
    </a>
</div>