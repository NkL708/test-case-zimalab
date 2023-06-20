<h1>Добавить пользователя</h1>
<form action="scripts/handlers.php" method="POST">
    <input type="hidden" name="operation" value="add">

    <div class="form-group">
        <label for="first-name">Имя:</label>
        <input type="text" id="first-name" class="form-control mb-2" placeholder="Имя" name="first_name">
    </div>

    <div class="form-group">
        <label for="last-name">Фамилия:</label>
        <input type="text" id="last-name" class="form-control mb-2" placeholder="Фамилия" name="last_name">
    </div>

    <div class="form-group">
        <label for="email">Почта:</label>
        <input type="email" id="email" class="form-control mb-2" placeholder="Почта" name="email">
    </div>

    <div class="form-group">
        <label for="phone-number-1">Номер телефона:</label>
        <input type="text" id="phone-number-1" class="form-control mb-2" placeholder="Номер телефона" name="phone_numbers[]">
    </div>

    <div class="form-group">
        <label for="phone-number-2">Рабочий номер телефона:</label>
        <input type="text" id="phone-number-2" class="form-control mb-2" placeholder="Рабочий номер телефона" name="phone_numbers[]">
    </div>

    <div class="form-group">
        <label for="phone-number-3">Дополнительный номер телефона:</label>
        <input type="text" id="phone-number-3" class="form-control mb-2" placeholder="Дополнительный номер телефона" name="phone_numbers[]">
    </div>

    <div class="form-group">
        <label for="company-name">Компания:</label>
        <input type="text" id="company-name" class="form-control mb-2" placeholder="Компания" name="company_name">
    </div>

    <div class="form-group">
        <label for="position">Позиция:</label>
        <input type="text" id="position" class="form-control mb-2" placeholder="Позиция" name="position">
    </div>

    <button type="submit" class="btn btn-success" action="scripts">Добавить</button>
</form>