<?php
require "db.php";
require 'getCourse.php';

$con = new Datebase();
$con->Connection();

$id_cur_user = $con->findIdUser();

$temp = $con->getCash($id_cur_user);

function Del_cookie(){

}

if(isset($_POST['wanna_info_cash'])){
    $cashs = $con->getCashList($id_cur_user);
}

function getTempCash(){
    return $GLOBALS['temp'];
}

if(isset($_POST['want_id_cash'])){
    $id_cur_user = $con->findIdUser();
    $temp = $con->getCashNEW($id_cur_user);
    echo(json_encode($temp));
}

if(isset($_POST['name_trMin']) && isset($_POST['cash_trMin']) && isset($_POST['balance_trMin']) && isset($_POST['comment_trMin'])){
    $id_cur_user = $con->findIdUser();
    $con->addTranzMin($_POST['name_trMin'],$_POST['cash_trMin'],$_POST['balance_trMin'],$_POST['comment_trMin'], $id_cur_user, $_POST['data_trMin']);
    //echo($_POST['name_trMin']."<br>".$_POST['cash_trMin']."<br>".$_POST['balance_trMin']."<br>".$_POST['comment_trMin']."<br>". $id_cur_user);
}

if(isset($_POST['name_trSum']) && isset($_POST['cash_trSum']) && isset($_POST['balance_trSum']) && isset($_POST['comment_trSum'])){
    $id_cur_user = $con->findIdUser();
    $con->addTranzSum($_POST['name_trSum'],$_POST['cash_trSum'],$_POST['balance_trSum'],$_POST['comment_trSum'], $id_cur_user, $_POST['data_trSum']);
    //echo($_POST['name_trSum']."<br>".$_POST['cash_trSum']."<br>".$_POST['balance_trSum']."<br>".$_POST['comment_trSum']."<br>". $id_cur_user);
}
/*
if(isset($_POST['tmper'])){
    $id_cur_user = $con->findIdUser();
    $con->getTranz($id_cur_user);
}*/

if(isset($_POST['del_tr']) && isset($_POST['index'])){
    $flag1 = $con->Del_tr($_POST['index']);

    //echo($_POST['index']);
    if($flag1){
        echo("Успешно!");
    }
    else echo("Не удачно...");


}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['wanna_tr_min'])){
    $id_cur_user = $con->findIdUser();
    $con->getTrMin($id_cur_user);
}

if(isset($_POST['wanna_tr_plus'])){
    $id_cur_user = $con->findIdUser();
    $con->getTrPlus($id_cur_user);
}

if(isset($_POST['wanna_tr_min_fromID'])){
    $id_cur_user = $con->findIdUser();
    $con->getTrMin_fromID($id_cur_user,$_POST['cash_index']);
}

if(isset($_POST['wanna_tr_plus_fromID'])){
    $id_cur_user = $con->findIdUser();
    $con->getTrPlus_fromID($id_cur_user,$_POST['cash_index']);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['test'])){
    $con->getUser_nameFromId(2);
}

if(isset($_POST['update_tr']) && isset($_POST['index'])){
    $con->getTranzFromID($_POST['index']);
}

if(isset($_POST['getCashList'])){
    $id_cur_user = $con->findIdUser();
    $con->getCashList($id_cur_user);

}

if(isset($_POST['want_id_cashDouble'])){
    $id_cur_user = $con->findIdUser();
    $con->getCashNEWDouble( $id_cur_user);
}
//&& isset($_POST['date_trans']) && isset($_POST['cash_min_trans']) && isset($_POST['cash_min_trans'])
if(isset($_POST['name_trans']) ){
    try{
        $id_cur_user = $con->findIdUser();
        $con->addTranslate($_POST['name_trans'],$_POST['date_trans'],$_POST['cash_min_trans'],$_POST['balanc_min_trans'],$_POST['course_trans'],$_POST['cash_sum_trans'],$_POST['balanc_sum_trans'],$_POST['comment_trans'],$id_cur_user);
        echo("Перевод добавлен!");
    }
    catch(Exception $e){
        echo("Оперцация не прошла...");
    }
}

if(isset($_POST['wanna_tr_trans'])){
    $id_cur_user = $con->findIdUser();
    $con->getTranslate( $id_cur_user);
}

if(isset($_POST['wanna_tr_trans_fromID'])){ ////////////////////////////////////////////////////////
    $id_cur_user = $con->findIdUser();
    $con->getTranslate_fromID( $id_cur_user, $_POST['cash_index']);
}

if(isset($_POST['getNewbalance'])){
    $arr_tmp = array();

    $balance = $_POST['balance'];
    $course = $_POST['course'];
    $name1_type_money = $con->getCourseCashInDB($_POST['last_cash']);
    $name2_type_money = $con->getCourseCashInDB($_POST['new_cash']);

    /*if( $course != ""){
        $get_cour1['sale'] = $course;
        $get_cour1['buy'] = $course;
        $get_cour2['sale'] = $course;
        $get_cour2['buy'] = $course;
    }
    else{*/
        $get_cour1 = getOneCourse($name1_type_money);

        $get_cour2 = getOneCourse($name2_type_money);
    //}

    //echo( $get_cour1['sale']);


    if($name1_type_money == $name2_type_money){
        $new_balance = (float)$balance;
        $courser=1;
        array_push($arr_tmp,(float)$courser, $new_balance);

    }
    else{
        if($name1_type_money == "UAH"){
            $new_balance = $balance / $get_cour2['sale'];
            $courser =round($get_cour2['sale'],2);
            array_push($arr_tmp,(float)$courser,(float)$new_balance);
        }
        if($name2_type_money == "UAH"){
            $new_balance = $balance * $get_cour1['buy'];
            $courser = $get_cour1['buy'];
            array_push($arr_tmp,(float)$courser,(float)$new_balance);
        }

        else{
            $new_balance = $balance * $get_cour1['sale'] / $get_cour2['buy'];
            $courser = $get_cour1['sale'] / $get_cour2['buy'];
            array_push($arr_tmp,(float)$courser,(float)$new_balance);
        }
    }
   echo(json_encode($arr_tmp));
}

if(isset($_POST['del_trans']) && isset($_POST['index_trans'])){
    $id_cur_user = $con->findIdUser();
    $flag = $con->Del_translate($_POST['index_trans']);
    if($flag){
        echo("Успешно!");
    }
    else echo("Не удачно...");
}
/*
if(isset($_POST['on_cash'])){
    $id_cur_user = $con->findIdUser();
    $id_cashON = $_POST['id_cash'];

    $con->getTrFromCash($id_cashON);
}*/

if(isset($_POST['wanna_info_tranz'])){

    if($_POST['id_tr'] != ""){
        $con->getTranzFromID($_POST['id_tr']);
    }
    else{
        if($_POST['id_trans'] != ""){
            $con->getTranslateFromID($_POST['id_trans']);
        }
    }

}

if(isset($_POST['up_name'])){
    $con->minBalanceTr($_POST['up_index'],$_POST['up_cash_min']);
    $con->trUpdateMin($_POST['up_index'],$_POST['up_name'], $_POST['up_cash_min'], $_POST['up_balance_min'], $_POST['up_comment'], "minus");

}

if(isset($_POST['up_name_sum'])){
    $con->plusBalanceTr($_POST['up_index_sum'],$_POST['up_cash_sum']);
    $con->trUpdatePlus($_POST['up_index_sum'],$_POST['up_name_sum'], $_POST['up_cash_sum'], $_POST['up_balance_sum'], $_POST['up_comment_sum'], "plus");
}


if(isset($_POST['up_trans_index'])){
    $con->minplusBalanceTrans($_POST['up_trans_index'],$_POST['up_trans_cash_min'],$_POST['up_trans_cash_sum']);
    $con->upDate_trans($_POST['up_trans_index'],$_POST['up_trans_name'],$_POST['up_trans_data'],$_POST['up_trans_cash_min'],$_POST['up_trans_balance_min'],$_POST['up_course'],$_POST['up_trans_cash_sum'],$_POST['up_trans_balance_sum'],$_POST['up_trans_comment']);

}

