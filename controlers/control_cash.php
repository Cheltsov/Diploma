<?php
require "db.php";
require_once "getCourse.php";

$con = new Datebase();
$con->Connection();

$id_cur_user = $con->findIdUser();

if(isset($_POST['wanna_info_cash'])){
    $cashs = $con->getCashList($id_cur_user);
}

 // Получить кошельки по id пользователя return массив


if(isset($_POST['add_cash'])){

    try{
        if(!isset($_POST['num_card'])) $_POST['num_card'] ="";
        $con->Insert_Cash($_POST['name_cash'],$_POST['type_money'],$_POST['num_card'],$_POST['type_cash'],$_POST['balance'],$_POST['comment']);

        echo("<script>alert('Кошелек успешно добавлен!');window.location = '../views/cash.php';</script>");
    }
    catch (Exception $e){
        echo($e);
    }
}




$temp = $con->getCash($id_cur_user);



function getTempCash(){
    return $GLOBALS['temp'];
}



if(isset($_POST['id_but'])){
    $numberToCash = $_POST['id_but'];
    $arr_infoFromId = $con->getIdCash($numberToCash);

    $infoToIdCash = $GLOBALS['arr_infoFromId'];



    echo(json_encode($infoToIdCash));

}

if(isset($_POST['num_id'])){
    $con->delCash($_POST['num_id']);
}
/*
if(isset($_POST['queryBut'])){
    $tp = $GLOBALS['temp'];
    echo(json_encode($tp));
}*/

if(isset($_POST['up_cash'])){
    $id_cash = $_POST['up_cash'];
    $row_cash = $con->getIdCash($id_cash);
    echo(json_encode($row_cash));
}

if(isset($_POST['newname_cash']) && isset($_POST['newtype_cash']) && isset($_POST['newtype_money']) && isset($_POST['newbalance'])){
    $con->updataCash($_POST['id_cash'],$_POST['newname_cash'],$_POST['newtype_money'],$_POST['newtype_cash'],$_POST['newbalance'], $_POST['newcomment']);
}


if(isset($_POST['id_cash'])){
    echo('111');
}

if(isset($_POST['val'])){

    $last_course = $_POST['last_course'];
    $cur_course = $_POST['val'];
    $cur_balance = $_POST['bal'];

    $cur_course_val = getOneCourse($last_course);

    $new_cur_course_val = getOneCourse($cur_course);



    //$new_bal = 0;

    if($last_course == "UAH"){
        $new_bal = $cur_balance * $new_cur_course_val['sale'];
        echo($new_bal);
        exit;
    }
    if($cur_course == "UAH"){
        $new_bal = $cur_balance / $cur_course_val['buy'];
        echo($new_bal);
        exit;
    }
    else{
        $new_bal = $cur_balance * $cur_course_val['sale'] / $new_cur_course_val['buy'];
        echo($new_bal);
        exit;
    }
    /*
    echo($cur_balance);
    echo('---');
    echo($new_bal);*/


}
