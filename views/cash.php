<?php
if(!isset($_COOKIE['SingIN'])){
    header('Location:../index.php');
}
//require "../controlers/db.php";

require "../controlers/control_main_page.php";

require "../controlers/control_cash.php";


    require "partpage.php";
    $part = new partPage();
    echo("<title>Ledger - Счета</title>");
    $part->head();
    echo('<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">');
    $part->arr_links("mainpage.css", "cash_style.css" );
    $part->script_links("https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js", "../js/accordion.js", "../js/tabs.js");

?>
    <style>
        #main:hover{
            text-decoration:underline;
        }
        h3{
            height:30px;
            width:250px;
            background-color:lightgrey;
        }
        .accord{
           /* padding-top:50px;*/
            width:34%;
            float:left;

        }
        .accord h3{
            width:250px;
            background-color:lightgrey;
        }
        .accord div{
            width:236px;

        }
        #tabs{
            width:60%;
            float:right;
        }
        .overflow {
            height: 200px;
        }
        #dia_form input{
            width:100%;
        }
        #dia_form textarea{
            width:99%;
        }

        #content{
            background-color:white;
            border-radius:5px;
        }
        .balance{
            float:left;
            border:1px solid green;
            width:340px;

        }
        .balance button{
            width:100%;
        }



    </style>

    <div class="balance">
        <h3>Общий баланс: 12312</h3>
        <div id="accordion" class="accord" >

            <h3>Наличные:</h3>
            <div id="hands">
            </div>
            <h3>Карта:</h3>
            <div id="cards">

            </div>

        </div>
    </div>

    <div id="content" style="width:800px;float:left"></div>


   



    <div style="margin-top:50px;float:right">
        <button id="add_cash" >Добавить</button>
        <br><br>
        <button id="up_cash" >Изменить</button>
        <br><br>
        <button id="del_cash">Удалить</button>
        <br>
    </div>
    <div id="dialog" >
        <h3 style="text-align:center; width:100%">Добавите кошелек</h3> <br>
        <form action="../controlers/control_cash.php" method="post" id="dia_form">
            <p>Название:</p>
            <input type="text"  required name="name_cash"><br><br>
            <p>Тип кошелька:</p>
            <select name="type_cash" id="number1" required >
                <option value="1">Наличные</option>
                <option value="2">Карта</option>
            </select><br>
            <div id="dop_content1" style="margin-top:20px"></div>

            <p>Валюта:</p>
            <select name="type_money" id="number2" required >
                <option value="UAH">UAH</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="RUR">RUR</option>
            </select><br><br>
            <p>Начальный баланс:</p>
            <input type="number"  step="any" name="balance"> <br><br>
            <p>Комментарий:</p>
            <textarea name="comment" id="" cols="20" rows="5" name="comment"></textarea><br><br>
            <input type="submit" value="Добавить" name="add_cash" id="sub">
        </form>
    </div>
<!--
-->
<div id="dialog2" style="display:none">
    <h3 style="text-align:center; width:100%">Изменить кошелек</h3> <br>
    <form action="" method="post" id="update_form">
        <p >Название:</p>
        <input type="text"  required name="new_name_cash" id="name_cash" class="momn"><br><br>
        <p>Тип кошелька:</p>
        <select name="new_type_cash" id="number3" required >
            <option value="1">Наличные</option>
            <option value="2">Карта</option>
        </select>
        <br>
        <div id="dop_content3" style="margin-top:20px"></div>


        <p>Валюта:</p>
        <select name="new_type_money" id="number4" required >
            <option value="UAH">UAH</option>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="RUR">RUR</option>
        </select><br><br>
        <p>Баланс:</p>
        <input type="number"  step="any" name="new_balance" id="balance" require> <br><br>
        <p>Комментарий:</p>
        <textarea name="new_comment" cols="20" rows="5" id="comment"></textarea><br><br>
        <input type="submit" value="Изменить" name="update_cash" id="update_cashBut">
    </form>
</div>

<div id="dialog3" style="text-align:center">
    <p >Вы действительно хотите удалить кошелек?</p>
    <br>
    <button id="yes">Да</button>
    <button id="no">Нет</button>

</div>


<?php

/*
   $arr_infoCash = getTempCash();

    foreach($arr_infoCash as $item){
        if($item->type_cash == '1'){
            echo("<script>
                    $('#hands').append('<button class=".'type'." id=".''."$item->id".">".$item->name.":".$item->balance."</button>');
                </script>");
        }
        if($item->type_cash == '2'){
            echo("<script>
                    $('#cards').append('<button class=".'type'." id=".''."$item->id".">".$item->name.":".$item->balance."</button>');
                </script>");
        }

    }
*/
?>

<script>



</script>



<?php
    $part->script_links("../js/cash.js");
    $part->foot();
?>

