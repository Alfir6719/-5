<?php

$con = mysqli_connect("localhost","root","","fitnes");

if(!empty($_POST)){

$surname = $_POST["surname"];
$name = $_POST["name"];
$patronymic = !empty($_POST["patronymic"]) ? $_POST["patronymic"] : "null";
$birthday = $_POST["birthday"];
$phone =  $_POST["phone"];
$gender = $_POST["gender"];
$photo = "trener1.png";
$pass = $_POST["password"];
$awards = !empty($_POST["awards"]) ? $_POST["awards"] : "-";
$created_at = date("Y-m-d H:i:s");

$query = "insert into users(id_users,surname,name,patronymic,phone,password,birthday,photo,gender,create_date,awards,role) 
values(null,'$surname','$name','$patronymic','$phone','$pass','$birthday','$photo','$gender','$created_at','$awards','3')";

$result = mysqli_query($con,$query);

if($result){
	echo "<script>alert('Запись добавлена успешна!');location.href='/'</script>";
}
else{
	echo "<script>alert('Ошибка добавления! Попробуйте снова.')</script>";
	echo mysqli_error($con);
}
}