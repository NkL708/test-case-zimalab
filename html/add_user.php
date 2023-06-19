<h1>Добавить пользователя</h1>
<form action="scripts/handlers.php" method="POST">
    <input type="hidden" name="operation" value="add">
    <input type="text" class="form-control mb-2" placeholder="Имя" name="first_name">
    <input type="text" class="form-control mb-2" placeholder="Фамилия" name="last_name">
    <input type="email" class="form-control mb-2" placeholder="Почта" name="email">
    <input type="text" class="form-control mb-2" placeholder="Компания" name="company_name">
    <input type="text" class="form-control mb-2" placeholder="Позиция" name="position">

    <button type="submit" class="btn btn-success" action="scripts">Добавить</button>
</form>
