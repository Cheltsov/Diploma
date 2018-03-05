<?php
if(!isset($_SESSION)){
    session_start();
}

require '../config/config_connect_DB.php';
require 'libs/rb.php';
require 'moveTo.php';




class Datebase
{
    function Connection(){
        R::setup('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', ADMIN, PASS);
        if(! R::testConnection()){
            exit("Подключение к базе не установлено!");
        }
    }

    function Insert_Registration($login,$email,$password){
        try{
           $users = R::dispense("users");
           //$users->iduser =$users->id;
           $users->login =$login;
           $users->email=$email;
           $users->password=$password;
           $users->date= R::isoDateTime();
           R::store($users);

            //$idUser = $users->id;

           /* $user = R::load("users", $idUser);
            $user->iduser=$users->id;
            R::store($user);*/
        }
        catch(Exception $e){
            echo($e);
        }
        //R::freeze(); заморозка
        R::close();
    }

    function findIdUser(){
        $users = R::findAll('users');
        foreach($users as $item){
            $name = $item->login;
            if($name == $_COOKIE['SingIN'])
                $idUser = ($item->id);
        }
        return  $idUser;
    }


    function Insert_Cash($namew, $type_money, $num_card, $type_cash, $balance,$comment){
        try{
            $connect = new Datebase();
            $tmp_idUser = $connect->findIdUser();

            $cash = R::dispense("cash");
            $cash->iduser = $tmp_idUser;
            $cash->name = $namew;
            $cash->type_money = $type_money;
            $cash->num_card = $num_card;
            $cash->type_cash = $type_cash;
            $cash->balance = $balance;
            $cash->comment = $comment;
            $cash->date_create = R::isoDateTime();
            $cash->date_update = R::isoDateTime();
            R::store($cash);

           // $idCash = $cash->id;

           /* $casher = R::load("cash", $idCash);
            $casher->idcash=$cash->id;
            R::store($casher);
*/
         /*   $id_cu = R::dispense("usercash");

           $id_cu->iduser = $idUser;
           $id_cu->idcash = $idCash;

           R::store($id_cu);*/



        }
        catch(Exception $e){
            echo($e);
        }

        R::close();
    }

    function Read($login_input){
       //$loa =  R::load('users','1');
       // $loads = R::loadAll('users', array());
       //echo "<pre>"; print_r($loads); echo "</pre>";
       /* foreach ($loads as $test){
            echo($test->login);
            echo("<br>");
        }*/
    }

    function testLogin($login_input){
        $names = R::find('users');
        foreach ( $names as $item) {
            if($item->login == $login_input){
                $flag=true;
            }
            else{
                $flag=false;
            }
        }
        if($flag == true){
            return true;
        }
        else{
            return false;
        }
    }

    function searchEmail($email_input){
        $flag = 0;
        $e_names = R::findAll('users');
        foreach ($e_names as $item) {
            if($item->email == $email_input){
                $flag = $item->id;
            }
        }
        return $flag;
    }


    function rewriteValue($id, $row, $value){
        try{
            $names = R::find('users');
            $usersAll = R::load("users", $id);
            $usersAll->$row=md5($value);
            R::store($usersAll);
        }
        catch(Exception $e){
            echo($e);
        }
        //R::freeze(); заморозка
        R::close();
    }


    function Registration($login,$item_email,$password,$second_password){
        $rou = new moveTo();
        $connect = new Datebase();

        if(!$connect->testLogin($login)){
            $item_login = $login;
        }
        else{
            echo("<script>alert('Такой пользователь существует');</script>");
            $rou->moveToIndex();
        }
        if(strlen($password)<30){
            if($password == $second_password){
                $item_password = md5($password);
            }
            else{
                echo(" <script> alert('Пароли не совпадают'); </script>");
            }
        }
        try {
            if(isset($item_login) && isset($item_email) && isset($item_password)){
              $connect->Insert_Registration($item_login,$item_email,$item_password);
              //echo("<script> alert('Регистрация прошла успешно!'); </script>");
                echo('Регистрация прошла успешно!');
              //$rou->moveToIndex();
            }
        }
        catch (Exception $e) {
            echo("Введите поля правильно");
        }
    }

    function singIn($login,$password){
        $rou = new moveTo();
        $names = R::findAll('users');
        foreach ($names as $item) {
            if($login == $item->login) $your_pass = $item->password;
        }
        if(!isset($your_pass)){
            $_SESSION['login'] = "0";
            echo("<script> alert('Такого пользователя нет'); </script> ");
            $rou->moveToIndex();
            exit;
        }
        if($your_pass == md5($password)){
            setcookie("SingIN", $login, time()+60*60*24*365*10, '/');
            //$rou->moveToMainPage();

            echo(1);
        }
        else{
            $_SESSION['login'] = "1";
            $rou->moveToIndex();
            //$flag=false;
        }
        //return $flag;
    }

    /* function getIdCash($iduser){
         /*$cashes = R::findAll('usercash');
         foreach ($cashes as $item) {
             if($item->iduser == $iduser){
                 echo($item->idcash);
             }
         }
         $tmp_cash = R::find('usercash',"iduser = $iduser");*/

         //return ($tmp_cash->idcash);
       /* $cash = R::getAll( "select * from cash inner join usercash using(idcash) where usercash.iduser = 5");
         echo("<pre>");
         print_r($cash);
         echo("</pre>");
     }*/

       function getCash($id_user){
           $arr_cash = array();
           $cash = R::find('cash',"iduser = $id_user");
          /* foreach($cash as $item){
                array_push($arr_cash,$item->$point);
           }*/
           //return $arr_cash;
           return $cash;
       }

    function getCashList($id_user){
        $arr_cash = array();
        $cash = R::find('cash',"iduser = $id_user");
         foreach($cash as $item){
              array_push($arr_cash,$item->id,$item->id_user,$item->name,$item->type_money,$item->type_cash,$item->balance, $item->comment, $item->data_create, $item->data_update, $item->num_card);
         }
        echo(json_encode($arr_cash));
    }

    function getIdCash($id_cash){
        $arr_tmp = array();
        $cash = R::find('cash',"id = $id_cash");
         foreach($cash as $item){
             $us = R::findAll('users',"id = $item->iduser");
             foreach($us as $tmp_us){
                 $us_name = $tmp_us->login;
             }
              array_push($arr_tmp,$item->id,$us_name,$item->name,$item->type_money,$item->type_cash,$item->balance,$item->comment, $item->date_create,$item->date_update, $item->num_card);
         }
        //return $arr_cash;
       // print_r($arr_tmp);

        return $arr_tmp;
    }


    function delCash($idCash){
        try{
            $cash = R::load("cash", $idCash);
            echo($cash->name);
            R::trash($cash);
            return true;
        }
        catch(Exception $e){
            echo($e);
        }
        R::close();

    }

    function updataCash(){
        try{
            $numargs = func_num_args();
            $arg_list = func_get_args();

            $cash = R::load("cash", $arg_list[0]);
            $cash->name = $arg_list[1];
            $cash->type_money = $arg_list[2];
            $cash->type_cash = $arg_list[3];
            $cash->balance = $arg_list[4];
            $cash->comment = $arg_list[5];
            $cash->date_update = R::isoDateTime();
            R::store($cash);
        }
        catch(Exception $e){
            echo($e);
        }

        R::close();

    }

    function getCashNEW($id_user){

            $arr_cash = array();
            $cash = R::find('cash',"iduser = $id_user");
             foreach($cash as $item){
                  array_push($arr_cash,$item->name,$item->type_money, $item->type_cash,$item->balance,$item->comment,$item->id_user,$item->id);
             }
            return $arr_cash;
    }

    function getCashNEWDouble($id_user){

        $arr_cash = array();
        $cash = R::find('cash',"iduser = $id_user");
        foreach($cash as $item){
            array_push($arr_cash,$item->name,$item->type_money, $item->type_cash,$item->balance,$item->comment,$item->id_user,$item->id);
        }
        echo(json_encode($arr_cash));
    }

    function getCourseCashInDB($id_cash){
        $cash = R::findAll('cash',"id = $id_cash");
        foreach($cash as $item){
            return $item->type_money;
        }
    }

    function addTranzMin(){

        try{
            $numargs = func_num_args();
            $arg_list = func_get_args();

            $tr = R::dispense("tranzaction");
            $tr->name = $arg_list[0];
            $tr->cash = $arg_list[1];
            $tr->balance = $arg_list[2];
            $tr->comment = $arg_list[3];
            $tr->userId = $arg_list[4];
            if(!isset($arg_list[5])) $tr->data = R::isoDateTime();
            else $tr->data = $arg_list[5];
            $tr->status = "minus";

            $cash = R::load("cash", $arg_list[1]);
            $cash->balance = $cash->balance - $arg_list[2];

            R::store($tr);
            R::store($cash);
        }
        catch(Exception $e){
            echo($e);
        }

        R::close();
    }

    function addTranzSum(){

        try{
            $numargs = func_num_args();
            $arg_list = func_get_args();

            $tr = R::dispense("tranzaction");
            $tr->name = $arg_list[0];
            $tr->cash = $arg_list[1];
            $tr->balance = $arg_list[2];
            $tr->comment = $arg_list[3];
            $tr->userId = $arg_list[4];
            if(!isset($arg_list[5])) $tr->data = R::isoDateTime();
            else $tr->data = $arg_list[5];
            $tr->status = "plus";

            $cash = R::load("cash", $arg_list[1]);
            $cash->balance = $cash->balance + $arg_list[2];

            R::store($tr);
            R::store($cash);
        }
        catch(Exception $e){
            echo($e);
        }

        R::close();
    }

    function whatBalance($id_cash){
        $cash = R::findAll('cash',"id = $id_cash");
        foreach($cash as $item){
            $balance = $item->balance;
        }
        echo($balance);
    }

    function getTranzFromID($id){
        $arr_tmp = array();
        $tr = R::findAll('tranzaction',"id = $id");
        foreach($tr as $item){
            array_push($arr_tmp,$item->id,$item->name,$item->cash,$item->balance,$item->comment,$item->user_id,$item->data);
        }
        echo(json_encode($arr_tmp));
    }

    function getTranzFromID_user($id_user){
        $arr_tmp = array();
        $tr = R::findAll('tranzaction',"user_id = $id_user");
        foreach($tr as $item){
            array_push($arr_tmp,$item->id,$item->name,$item->cash,$item->balance,$item->comment,$item->user_id,$item->data);
        }
        return(json_encode($arr_tmp));
    }
/*
    function getTrFromCash($id_cash){
        $arr_tmp = array();
        $tr = R::findAll('tranzaction',"cash = $id_cash");
        foreach($tr as $item){
            array_push($arr_tmp,$item->id,$item->name,$item->cash,$item->balance,$item->comment,$item->user_id,$item->data);
        }
        echo(json_encode($arr_tmp));
       //print_r($tr);
    }*/


    function getTrMin($id_user){
        $arr_tmp = array();
        $name_cash = "";
        $tr = R::findAll('tranzaction',"user_id = $id_user");
        foreach($tr as $item){
            if($item->status == "minus"){
                $cash = R::findAll('cash',"id = $item->cash");
                foreach($cash as $tmp){
                    $name_cash = $tmp->name;
                }
                $us = R::findAll('users',"id = $item->user_id");
                foreach($us as $tmp_us){
                    $us_name = $tmp_us->login;
                }
                if($name_cash=="")  $name_cash="Удален";
                array_push($arr_tmp,$item->id,$item->name,$name_cash,$item->balance,$item->comment,$us_name,$item->data);
                $name_cash="";
            }
        }
        echo(json_encode($arr_tmp));
        R::close();
    }

    function getTrMin_fromID($id_user, $id_cash){
        $arr_tmp = array();
        $name_cash = "";
        $tr = R::findAll('tranzaction',"user_id = $id_user and cash = $id_cash");
        foreach($tr as $item){
            if($item->status == "minus"){
                $cash = R::findAll('cash',"id = $item->cash");
                foreach($cash as $tmp){
                    $name_cash = $tmp->name;
                }
                $us = R::findAll('users',"id = $item->user_id");
                foreach($us as $tmp_us){
                    $us_name = $tmp_us->login;
                }
                if($name_cash=="")  $name_cash="Удален";
                array_push($arr_tmp,$item->id,$item->name,$name_cash,$item->balance,$item->comment,$us_name,$item->data);
                $name_cash="";
            }
        }
        echo(json_encode($arr_tmp));
        R::close();
    }


    function getTrPlus($id_user){
        $arr_tmp = array();
        $name_cash = "";
        $tr = R::findAll('tranzaction',"user_id = $id_user");
        foreach($tr as $item){
            if($item->status == "plus"){
                $cash = R::findAll('cash',"id = $item->cash");
                foreach($cash as $tmp){
                    $name_cash = $tmp->name;
                }
                $us = R::findAll('users',"id = $item->user_id");
                foreach($us as $tmp_us){
                    $us_name = $tmp_us->login;
                }
                if($name_cash=="")  $name_cash="Удален";
                array_push($arr_tmp,$item->id,$item->name,$name_cash,$item->balance,$item->comment,$us_name,$item->data);
                $name_cash="";
            }
        }
        echo(json_encode($arr_tmp));
        R::close();
    }

    function getTrPlus_fromID($id_user, $id_cash){
        $arr_tmp = array();
        $name_cash = "";
        $tr = R::findAll('tranzaction',"user_id = $id_user and cash = $id_cash");
        foreach($tr as $item){
            if($item->status == "plus"){
                $cash = R::findAll('cash',"id = $item->cash");
                foreach($cash as $tmp){
                    $name_cash = $tmp->name;
                }
                $us = R::findAll('users',"id = $item->user_id");
                foreach($us as $tmp_us){
                    $us_name = $tmp_us->login;
                }
                if($name_cash=="")  $name_cash="Удален";
                array_push($arr_tmp,$item->id,$item->name,$name_cash,$item->balance,$item->comment,$us_name,$item->data);
                $name_cash="";
            }
        }
        echo(json_encode($arr_tmp));
        R::close();
    }

    function getUser_nameFromId($id_user){
        $user = R::find('users', "id = $id_user");
        foreach($user as $item){
            echo($item->login);
        }
    }

    function Del_tr($index){
        try{
            $tr = R::load('tranzaction', $index);
            R::trash($tr);
            return true;
        }
        catch(Exception $e){
            echo($e);
        }
        R::close();
    }

    function Del_translate($id_trans){
        try{
            $trans = R::load('translate', $id_trans);
            R::trash($trans);
            return true;


        }
        catch(Excetpion $e){
            echo($e);
        }
        R::close();
    }

    function addTranslate(){
        try{
            $numargs = func_num_args();
            $arg_list = func_get_args();
            $trans = R::dispense('translate');
            $trans->name = $arg_list[0];

            $cash_min = R::load('cash', $arg_list[2]);
            $cash_min->balance -= $arg_list[3];

            $cash_sum = R::load('cash', $arg_list[5]);
            $cash_sum->balance += $arg_list[6];

            if(!isset($arg_list[1])) $trans->data = R::isoDateTime();
            else $trans->data = $arg_list[1];

            $trans->cash_min = $arg_list[2];

            $trans->balance_min = $arg_list[3];

            $trans->course = $arg_list[4];

            $trans->cash_sum = $arg_list[5];

            $trans->balance_sum = $arg_list[6];

            $trans->comment = $arg_list[7];
            $trans->id_user = $arg_list[8];

            R::store($trans);
            R::store($cash_min);
            R::store($cash_sum);

        }
        catch(Exception $e){
            echo($e);
        }
        R::close();
    }

    function getTranslate($id_user){
        $arr_tmp = array();
        $name_cash_min="";
        $name_cash_sum="";
        $trans = R::findAll('translate', "id_user = $id_user");
        foreach($trans as $item){
            $cash1 = R::findAll('cash',"id = $item->cash_min");
            foreach($cash1 as $tmp1){
                $name_cash_min = $tmp1->name;
            }
            $cash2 = R::findAll('cash',"id = $item->cash_sum");
            foreach($cash2 as $tmp2){
                $name_cash_sum = $tmp2->name;
            }
            $us = R::findAll('users',"id = $item->id_user");
            foreach($us as $tmp_us){
                $us_name = $tmp_us->login;
            }
            array_push($arr_tmp,$item->id,$item->name,$item->data,$name_cash_min,$item->balance_min,$name_cash_sum,$item->balance_sum,$item->comment,$us_name);
            $name_cash_sum="";
            $name_cash_min="";
        }
        echo(json_encode($arr_tmp));
    }

    function getTranslate_fromID($id_user, $id_cash){
        $arr_tmp = array();
        $name_cash_min="";
        $name_cash_sum="";
        $trans = R::findAll('translate', "id_user = $id_user and cash_min = $id_cash or cash_sum = $id_cash");
        foreach($trans as $item){
            $cash1 = R::findAll('cash',"id = $item->cash_min");
            foreach($cash1 as $tmp1){
                $name_cash_min = $tmp1->name;
            }
            $cash2 = R::findAll('cash',"id = $item->cash_sum");
            foreach($cash2 as $tmp2){
                $name_cash_sum = $tmp2->name;
            }
            $us = R::findAll('users',"id = $item->id_user");
            foreach($us as $tmp_us){
                $us_name = $tmp_us->login;
            }
            array_push($arr_tmp,$item->id,$item->name,$item->data,$name_cash_min,$item->balance_min,$name_cash_sum,$item->balance_sum,$item->comment,$us_name);
            $name_cash_sum="";
            $name_cash_min="";
        }
        echo(json_encode($arr_tmp));
    }

    function getTranslateFromID($id){
        $arr_tmp = array();
        $trans = R::findAll('translate', "id = $id");
        foreach($trans as $item){
            array_push($arr_tmp,$item->id,$item->name,$item->data,$item->cash_min,$item->balance_min,$item->cash_sum,$item->balance_sum,$item->comment,$item->id_user,$item->course);
        }
        echo(json_encode($arr_tmp));
    }

    function minBalanceTr($id,$id_cash){
        $tr = R::findAll('tranzaction', "id = $id");
        foreach($tr as $item){
           $tr_balance = $item->balance;
           $tr_cash = $item->cash;
        }
        $cash = R::load('cash', $tr_cash);
        $cash->balance += $tr_balance;

        R::store($cash);
        R::close();

    }

    function plusBalanceTr($id,$id_cash){
        $tr = R::findAll('tranzaction', "id = $id");
        foreach($tr as $item){
            $tr_balance = $item->balance;
            $tr_cash = $item->cash;
        }
        $cash = R::load('cash', $tr_cash);
        $cash->balance -= $tr_balance;

        R::store($cash);
        R::close();

    }

    function trUpdateMin(){
        try{
            $numargs = func_num_args();
            $arg_list = func_get_args();

            $tr_new = R::load("tranzaction", $arg_list[0]);
            $tr_new->name = $arg_list[1];
            $tr_new->cash = $arg_list[2];
            $tr_new->balance = $arg_list[3];
            $tr_new->comment = $arg_list[4];
            $tr_new->status = $arg_list[5];
            R::store($tr_new);

            $cash = R::load('cash', $arg_list[2]);
            $cash->balance -= $arg_list[3];
            R::store($cash);
        }
        catch(Exception $e){
            echo("Не удалось обновить транзакцию");
        }
        R::close();
    }

    function trUpdatePlus(){
        try{
            $numargs = func_num_args();
            $arg_list = func_get_args();

            $tr_new = R::load("tranzaction", $arg_list[0]);
            $tr_new->name = $arg_list[1];
            $tr_new->cash = $arg_list[2];
            $tr_new->balance = $arg_list[3];
            $tr_new->comment = $arg_list[4];
            $tr_new->status = $arg_list[5];
            R::store($tr_new);

            $cash = R::load('cash', $arg_list[2]);
            $cash->balance += $arg_list[3];
            R::store($cash);
        }
        catch(Exception $e){
            echo("Не удалось обновить транзакцию");
        }
        R::close();
    }

    function minplusBalanceTrans($id,$id_cash_min,$id_cash_sum){
        $trans = R::findAll('translate', "id = $id");
        foreach($trans as $item){
            $tran_cash_min = $item->cash_min;
            $tran_balance_min = $item->balance_min;
            $tran_cash_sum = $item->cash_sum;
            $tran_balance_sum = $item->balance_sum;
        }
        $cash = R::load('cash', $tran_cash_min);
        $cash->balance += $tran_balance_min;

        $cash_new = R::load('cash',  $tran_cash_sum);
        $cash_new->balance -= $tran_balance_sum;

        R::store($cash);
        R::store($cash_new);
        R::close();

    }

    function upDate_trans(){
        try{
            $numargs = func_num_args();
            $arg_list = func_get_args();

            $trans = R::load('translate', $arg_list[0]);
            $trans->name = $arg_list[1];
            $trans->data = $arg_list[2];
            $trans->cash_min = $arg_list[3];
            $trans->balance_min = $arg_list[4];
            $trans->course = $arg_list[5];
            $trans->cash_sum = $arg_list[6];
            $trans->balance_sum = $arg_list[7];
            $trans->comment = $arg_list[8];
            R::store($trans);

            $cash = R::load('cash', $arg_list[3]);
            $cash->balance -= $arg_list[4];
            R::store($cash);

            $cash_new = R::load('cash',$arg_list[6] );
            $cash_new->balance += $arg_list[7];
            R::store($cash_new);
        }
        catch(Exception $e){
            echo("Не удалось обновить транзакцию");
        }
        R::close();
    }

    function getDataOfTr_Sum($id_user){ // получить дату если статус плюс
        $arr_tmp = array();
        $tr = R::find('tranzaction',"user_id = $id_user and status = 'plus'");

        foreach($tr as $item){
            array_push($arr_tmp,substr($item->data, 0,10));
        }
        $result = array_unique($arr_tmp);
        return($result);
    }
    function getDataOfTr_Min($id_user){ // получить дату если статус минус
        $arr_tmp = array();
        $tr = R::findAll('tranzaction',"user_id = $id_user and status = 'minus'");
        foreach($tr as $item){
            array_push($arr_tmp,substr($item->data, 0,10));
        }
        $result = array_unique($arr_tmp);
        return($result);
    }

   function getAllBalanceOfData($id_user, $status){
       $arr_tmp = array();
       $tr = R::getAll("select name, date(data) as data, balance from tranzaction  where  user_id = $id_user and status = '$status' group by data ");
       foreach($tr as $item){
           array_push($arr_tmp, $item['name'], $item['data'], $item['balance']);
       }
       return $arr_tmp;
   }


}



?>