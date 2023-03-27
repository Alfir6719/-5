<?php

$con = mysqli_connect("localhost","root","","fitnes");

if(!empty($_POST)){

$surname = $_POST["surname"];
$name = $_POST["name"];
$patronymic = !empty($_POST["patronymic"]) ? $_POST["patronymic"] : "null";
$birthday = $_POST["birthday"];
$phone =  $_POST["phone"];
$gender = $_POST["gender"];
$photo = null;
$pass = $_POST["password"];
$awards = null;
$created_at = date("Y-m-d H:i:s");

$query = "insert into users(id_users,surname,name,patronymic,phone,password,birthday,photo,gender,create_date,awards,role) 
values(null,'$surname','$name','$patronymic','$phone','$pass','$birthday', '$photo','$gender','$created_at', '$awards','1')";

$result = mysqli_query($con,$query);

if($result){
	echo "<script>alert('Запись добавлена успешна!');location.href='/'</script>";
}
else{
	echo "<script>alert('Ошибка добавления! Попробуйте снова.')</script>";
	echo mysqli_error($con);
}
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Регистрация</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        * {
    box-sizing: border-box;
   }
   
   body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
   }
   
   .container {
    margin: 50px auto;
    width: 600px;
    background-color: #fafafa;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
    padding: 30px;
   }
   
   h1 {
    margin: 0 0 20px 0;
    text-align: center;
    color: #333333;

   }
   
   form {
    display: flex;
    margin: 50px auto;
    flex-direction: column;
    width: 300px;
   }
   
   label {
    margin: 10px 0 5px 0;
    color: #666666;
    font-weight: bold;
   }
   
   .input_group {
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #f2f2f2;
    margin-bottom: 20px;
    font-size: 16px;
    color: #333333;
   }
   
   button[type="submit"] {
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #333333;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
   }
   
   button[type="submit"]:hover {
    background-color: #4d4d4d;
   }

   .error_form{
        color: red;
    }
    </style>
    <title>Document</title>
</head>
<body>
<div class="container">
  <form id="form" method="POST">
  <h1>Регистрация</h1>
  <div class="input-group"><label for="surname">Введите фамилию</label><input required id="surname" name="surname" type="text"></div>
        <div class="input-group"><label for="name">Введите имя</label><input required id="name" name="name" type="text"></div>
        <div class="input-group"><label for="patronymic">Введите отчество</label><input id="patronymic" name="patronymic" type="text"></div>
        <div class="input-group"><label for="birthday">Введите дату рождения</label><input required id="birthday" name="birthday" type="date"></div>
        <div class="input-group"><label for="phone">Введите номер телефона</label><input required id="phone" name="phone" type="text"></div>
        <label for="#" style="margin:5px;">Выберите пол</label>
        <div class="input-group i-g-radio">
            <label for="g-m">М</label><input id="g-m" name="gender" type="radio" value="M" checked>
            <label for="g-w">Ж</label><input id="g-w" name="gender" type="radio" value="W">
        </div>
        <div class="input-group"><label for="password">Введите пароль</label><input required id="password" name="password" type="password"></div>
        <div class="input-group"><label for="confirm_password">Повторите пароль</label><input required id="confirm_password" name="confirm_password" type="password">
            <span class="error_form" id="error_pass"></span>
        </div>
        
   <button type="submit">Зарегистрироваться</button>
  </form>
 </div>
 <script>
    const pass = document.getElementById("password");
    const confirm_pass = document.getElementById("confirm_password");
    const form = document.getElementById("form");

    form.addEventListener("submit", (event) => {
        if (pass.value !== confirm_pass.value) {
            event.preventDefault();
            document.getElementById("error_pass").innerText = "Пароли не совпадают!";
        }
    });
 </script>
</body>
</html>

