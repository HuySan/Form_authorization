<?php
function check(){
	require_once('connection_with_bd.php');

	$res = mysqli_query($connect,"SELECT mail FROM `form`");
	$res = mysqli_fetch_all($res);

	$mail = mysqli_real_escape_string($connect,$_POST['mail']);
	$password = mysqli_real_escape_string($connect,$_POST['password']);

	$value = true;

	if(isset($_POST['btn']) && !empty($_POST['mail']) && !empty($_POST['password'])){
		foreach($res as $item){
			if($_POST['mail'] == $item[0]){
				return "Такая почта уже зарегистрирована,пожалуйста введите новую или попробуйте авторизироваться";
				$value = false;
			}
		}
		if($value){
			mysqli_query($connect,"INSERT INTO `form`(mail,password) VALUES('$mail','$password')");
			header("location: authorization.html");
			//return "Вы успешно зарегистировлись,введите данные для авторизации";
		}		
	}	
}
?>