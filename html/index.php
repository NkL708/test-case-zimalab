<?
require "database.php";
$users = Database::getUsers();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Управление пользователями</title>
</head>
<body>
    
    <div class="container">
        <h1>Управление пользователями</h1>
        <table>
            <tr>
                <th>Id</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Почта</th>
                <th>Компания</th>
                <th>Позиция</th>
            </tr>
            
            <? foreach ($users as $user): ?>
            <? /** @var User $user */ ?>
            <tr>
                <td><?= $user->getId() ?></td>
                <td><?= $user->getFirstName() ?></td>
                <td><?= $user->getLastName() ?></td>
                <td><?= $user->getEmail() ?></td>
                <td><?= $user->getCompanyName() ?></td>
                <td><?= $user->getPosition() ?></td>
            </tr>
            <? endforeach; ?>
        </table>
    </div>
</body>
</html>
