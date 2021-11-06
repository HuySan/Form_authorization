<?php
function auth_check(){
	$value = true;
	require_once('connection_with_bd.php');
	if(isset($_POST['btn1']) && !empty($_POST['auth_mail']) && !empty($_POST['auth_password'])){
		$res = mysqli_query($connect,"SELECT `mail`,`password` FROM `form` WHERE 1");
		$res = mysqli_fetch_all($res,MYSQLI_ASSOC);
		
		foreach($res as $item){
			if($item['mail'] == $_POST['auth_mail'] && $item['password'] == $_POST['auth_password']){
				session_start();
				$_SESSION['mail'] = $_POST['auth_mail'];
				$_SESSION['pass'] = $_POST['auth_password'];
				$value = false;
				header('location: ./home.html');
				die();
			}
		}
		if($value){
			return "Неверно введён пароль или введена почта";
		}
	}
}
?>