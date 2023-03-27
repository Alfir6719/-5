<?php

$con = mysqli_connect("localhost","root","","fitnes");
$trener_id = $_GET["trener"];
$sql_query = "DELETE FROM users WHERE id_users = '$trener_id'";
$result = mysqli_query($con,$sql_query);
if($result){
	echo "<script>alert('Тренер успешно удалён!');location.href='/'</script>";
}
else{
	echo "<script>alert('Ошибка удаления! Попробуйте снова.')</script>";
	echo mysqli_error($con);
}
?>