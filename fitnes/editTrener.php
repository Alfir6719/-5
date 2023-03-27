 <?php
include("header.php");

$con = mysqli_connect("localhost","root","","fitnes");
$sql_query = "select id_users, surname, name, patronymic from users where role=3";
$result = mysqli_query($con,$sql_query);

$trener_id = !empty($_GET["trener"]) ? $_GET["trener"] : 1;
$trener_info = mysqli_fetch_array(mysqli_query($con, "select * from users where id_users=$trener_id"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление тренерами</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
	<div class="container">
		<div class="list_trener">
			<?php
				while($trener = mysqli_fetch_array($result)){
					?>
						<div class="trener-item">
							<p><?=$trener['surname']." ".$trener['name']." ".$trener['patronymic'];?></p>
							<p>
								<a href="?trener=<?=$trener['id_users'];?>"><button class="btn btn-edit">Редактировать</button></a>
								<a href="./delTrenerDB.php?trener=<?=$trener['id_users'];?>"><button class="btn btn-delete" >Удалить</button></a>
							</p>
						</div>
					<?php
				}
		?>
		</div>
		<div class="dobav-tren">
    <h2>Добавление тренера</h2>
    <form action="" method="POST">
        <div class="input-group"><label for="surname">Введите фамилию</label><input value="<?=$trener_info["surname"]?>" required id="surname" name="surname" type="text"></div>
        <div class="input-group"><label for="name">Введите имя</label><input value="<?=$trener_info["name"]?>" required id="name" name="name" type="text"></div>
        <div class="input-group"><label for="patronymic">Введите отчество</label><input value="<?=$trener_info["patronymic"]?>" id="patronymic" name="patronymic" type="text"></div>
        <div class="input-group"><label for="birthday">Введите дату рождения</label><input value="<?=$trener_info["birthday"]?>" required id="birthday" name="birthday" type="date"></div>
        <div class="input-group"><label for="phone">Введите номер телефона</label><input value="<?=$trener_info["phone"]?>" required id="phone" name="phone" type="text"></div>
        <div class="input-group"><label for="photo">Выберите фото</label><input id="photo" name="photo" type="file"></div>
        <label for="#" style="margin:5px;">Выберите пол</label>
        <div class="input-group i-g-radio">
            <label for="g-m">М</label><input id="g-m" name="gender" type="radio" value="М" <?=($trener_info["gender"]=="М")?"checked":""?>>
            <label for="g-w">Ж</label><input id="g-w" name="gender" type="radio" value="Ж" <?=($trener_info["gender"]=="Ж")?"checked":""?>>
        </div>
        <div class="input-group"><label for="password">Введите пароль</label><input value="<?=$trener_info["password"]?>" required id="password" name="password" type="password"></div>
        <div class="input-group"><label for="awards">Введите награды</label><input value="<?=$trener_info["awards"]?>"  id="awards" name="awards" type="text"></div>
        <div class="input-group"><input type="submit" value="Редактировать"></div>
    </form> 
</div>
	</div>
</body>
</html>
<script>
	function editTrener(idTrener){
		console.log(idTrener);
	}
</script>

<?php
if(!empty($_POST)){

$surname = $_POST["surname"];
$name = $_POST["name"];
$patronymic = !empty($_POST["patronymic"]) ? $_POST["patronymic"] : "null";
$birthday = $_POST["birthday"];
$phone =  $_POST["phone"];
$gender = $_POST["gender"];
$photo = $_POST["photo"];
$pass = $_POST["password"];
$awards = !empty($_POST["awards"]) ? $_POST["awards"] : "-";
$created_at = date("Y-m-d H:i:s");

$query = "UPDATE users SET surname='$surname', name='$name', patronymic='$patronymic', phone='$phone', password='$pass', 
birthday='$birthday', photo='$photo', gender='$gender', photo='$photo', create_date='$created_at', awards='$awards', role='3' WHERE id_users='$trener_id'";
$result = mysqli_query($con,$query);

if($result){
	echo "<script>alert('Тренер отредактирован успешно!');location.href='/'</script>";
}
else{
	echo "<script>alert('Ошибка редактирования! Попробуйте снова.')</script>";
	echo mysqli_error($con);
}
}
?>