<?php

	require 'db.php';
	require 'mail.php';

	$con = new Datebase();
	$con->Connection();
	$mail = new Mail();

	//if(isset($_POST['sing'])){
if(isset($_POST['first_name']) && isset($_POST['pass']))
		$con->singIn($_POST['first_name'],$_POST['pass']);

	//}

	//if(isset($_POST['singIn'])){
if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['second_password'])){
		if ($con->searchEmail($_POST['email'])==0 ) {
			$con->Registration($_POST['login'],$_POST['email'],$_POST['password'],$_POST['second_password']);
		}
		else{
			echo("<script> alert('Такой пользователь уже есть!'); window.location = '../index.php'; </script> ");
		}

	}

	if(isset($_POST['singNew'])){

		if($con->searchEmail($_POST['email'])!=0){
		    //Получить id по email
			$id = $con->searchEmail($_POST['email']);
			//Генерировать случайный пароль
            $pass_key = $mail->randPass();
            // смена значения пароля на '1111'
			$con->rewriteValue($id, 'password', $pass_key);
            //Отправить пароль на почту
            $mail->SentMail($_POST['email'], $pass_key);
			echo("<script> alert('На почту выслан новый пароль'); window.location = '../index.php'; </script> ");
		}
		else{
			echo("<script> alert('Пользователя не существует'); window.location = '../index.php'; </script> ");
		}
	}

 ?>