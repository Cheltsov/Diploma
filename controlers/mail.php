<?php

class Mail{

	function SentMail($email, $new_password){
        $sitename = "Ledger";
        $headers  = "Content-type: text/html; charset= utf-8 \r\n";
        $headers .= "From: Ledger\r\n";
        $pagetitle = "\"$sitename\"";
        $message = "Ваш новый пароль был сменен! <br> Ваш новый пароль: ".$new_password;
        try{
            mail($email, $pagetitle, $message, $headers);
        }
        catch(Exception $e){
            echo($e);
        }
	}

	function randPass(){
        // Символы, которые будут использоваться в пароле.
        $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        // Количество символов в пароле.
        $max=5;
        // Определяем количество символов в $chars
        $size=StrLen($chars)-1;
        // Определяем пустую переменную, в которую и будем записывать символы.
        $password=null;
        // Создаём пароль.
        while($max--)
            $password.=$chars[rand(0,$size)];
        return $password;
	}

}

 ?>