<?php
include("header.php");
?>

<div class="flex-column-center">
    <h2>Добавление тренера</h2>
    <form action="/addTrenerDB.php" method="POST">
        <div class="input-group"><label for="surname">Введите фамилию</label><input required id="surname" name="surname" type="text"></div>
        <div class="input-group"><label for="name">Введите имя</label><input required id="name" name="name" type="text"></div>
        <div class="input-group"><label for="patronymic">Введите отчество</label><input id="patronymic" name="patronymic" type="text"></div>
        <div class="input-group"><label for="birthday">Введите дату рождения</label><input required id="birthday" name="birthday" type="date"></div>
        <div class="input-group"><label for="phone">Введите номер телефона</label><input required id="phone" name="phone" type="text"></div>
        <div class="input-group"><label for="photo">Выберите фото</label><input id="photo" name="photo" type="file"></div>
        <label for="#" style="margin:5px;">Выберите пол</label>
        <div class="input-group i-g-radio">
            <label for="g-m">М</label><input id="g-m" name="gender" type="radio" value="M" checked>
            <label for="g-w">Ж</label><input id="g-w" name="gender" type="radio" value="W">
        </div>
        <div class="input-group"><label for="password">Введите пароль</label><input required id="password" name="password" type="password"></div>
        <div class="input-group"><label for="awards">Введите награды</label><input  id="awards" name="awards" type="text"></div>
        <div class="input-group"><input type="submit" value="Добавить"></div>
    </form> 
</div>

</body>
</html>

