<?php
    session_start();

    
$con = mysqli_connect("localhost","root","","fitnes");

if(!empty($_POST)){
$phone =  $_POST["phone"];
$pass = $_POST["password"];
$query = "select password, role from users where phone = '$phone'";
mysqli_query($con,$query);
$password = mysqli_fetch_array(mysqli_query($con, $query))[0];
$role = mysqli_fetch_array(mysqli_query($con, $query))[1];
echo $pass;
var_dump($password);
var_dump($role);

if($pass == $password) {
	$_SESSION["role_user"] = $role;
    echo "<script>alert('Вы зашли на свой аккаунт!'); location.href='/';</script>";
}
else{
	echo "<script>alert('Ошибка входа!')";
}
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Авторизация</title>
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
    </style>
    <title>Document</title>
</head>
<body>
<div class="container">
  <form method="POST">
  <h1>Авторизация</h1>
        <div class="input-group"><label for="phone">Введите номер телефона</label><input required id="phone" name="phone" type="text"></div>
        <div class="input-group"><label for="password">Введите пароль</label><input required id="password" name="password" type="password"></div>
   <button type="submit">Войти</button>
 </div>
</body>
</html>
