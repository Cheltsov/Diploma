<?php
if(!isset($_COOKIE['SingIN'])){
    header('Location:../index.php');
}
require "../controlers/control_main_page.php";

require "../controlers/control_tranzactions.php";



if(!isset($_COOKIE['SingIN'])){
    header('Location:../index.php');
}
require "partpage.php";
$part = new partPage();
echo("<title>Ledger - Транзакции</title>");
$part->head();
echo('<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">');
$part->arr_links("mainpage.css", "tranz_style.css" );
$part->script_links("https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js", "../js/accordion.js", "../js/tabs.js", "../libs/cellSelection.min.js");
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.3.2/flatpickr.min.js"></script>
<link rel="stylesheet" type="text/css" href="../libs/node_modules/flatpickr/dist/themes/material_blue.css">
<script src="../libs/node_modules/flatpickr/dist/flatpickr.js"></script>

<!--<script src="../libs/cellSelection.min.js"></script>-->

<style>
    .accord{
        /* padding-top:50px;*/
        width:100%;
        float:left;

    }
    .accord h3{
        width:300px;
        background-color:lightgrey;
    }
    .accord div{
        width:244px;

    }
    .balance{
        float:left;
        border:1px solid green;
        width:350px;
    }
    .balance button{
        width:100%;
    }
    #menu{
        overflow: auto;
        height:650px;
        background-color:white;
        width:65%;
        float:left;
        margin-rigth:20px;
    }
    #menu h3{
        padding-left:5px;
        height:30px;
        font-size:16pt;
        background-color:DarkSlateBlue;
        color:lightgrey;
        cursor: pointer

    }
</style>


<div class="balance">
    <button id="all_bal">Все транзакции </button>
    <br>
    <br>
    <div id="accordion" class="accord" >

        <h3>Наличные:</h3>
        <div id="hands">

        </div>
        <h3>Карта:</h3>
        <div id="cards">

        </div>

    </div>
</div>



<div id="menu">
    <h3>Доходы</h3>
    <table id = "plusTable">

    </table>
    <br>
    <h3>Расходы</h3>
    <table id = "minTable">

    </table>
    <br>
    <h3>Переводы</h3>
    <table id = "transTable">

    </table>

</div>

<style>
    .col:hover{
        background-color:lightgrey;
    }
    th{
        padding:6px;
    }
    td{
        padding:6px;
        text-align:center
    }
    table{
        width:100%
    }
</style>

<div style="float:right">
    <button id="add_tr">Добавить</button>
    <br>
    <br>
    <button id="up_tr">Изменить</button>
    <br><br>
    <button id="del_tr">Удалить</button>
    <br>
</div>

<div id="dialog3" style="text-align:center">
    <p >Вы действительно хотите удалить транзакцию?</p>
    <br>
    <button id="yes">Да</button>
    <button id="no">Нет</button>

</div>




<div id="content_test" style="margin:150px; float:none"></div>






<div id="dialog" >

    <h3 style="text-align:center; width:100%">Добавить</h3>

  <div id="tabs">
        <ul>
            <li><a href="#fragment-1">Расход</a></li>
            <li><a href="#fragment-2">Доход</a></li>
            <li><a href="#fragment-3" id="add_translate">Перевод</a></li>
        </ul>
        <div id="fragment-1">

            <form action="" method="post" id="tr_form_minus">
                <p>Название:</p>
                <input type="text"  required name="name_tr_minus"><br><br>
                <p>Дата:</p>
                <input type="text" id="add_data"><br><br>
                <p>Кошелек:</p>
                <select name="cash_minus" id="cash_minus_sel" required >
                </select>
                <br><br>


                <p>Сумма:</p>
                <input type="number" required step="any" name="balance_minus"> <br><br>
                <p>Комментарий:</p>
                <textarea id="" cols="20" rows="5" name="comment_minus"></textarea><br><br>
                <input type="submit" value="Добавить" name="add_tr_minus" id="sub">
            </form>
        </div>
        <div id="fragment-2">

            <form action="" method="post" id="tr_form_sum">
                <p>Название:</p>
                <input type="text"  required name="name_tr_sum"><br><br>
                <p>Дата:</p>
                <input type="text" id="add_data2"><br><br>
                <p>Кошелек:</p>
                <select name="cash_sum" id="cash_sum_sel" required >
                </select>
                <br><br>

                <p>Сумма:</p>
                <input type="number"  step="any" name="balance_sum"> <br><br>
                <p>Комментарий:</p>
                <textarea id="" cols="20" rows="5" name="comment_sum"></textarea><br><br>
                <input type="submit" value="Добавить" name="add_tr_sum" id="sub">
            </form>

        </div>
        <div id="fragment-3">
            <form action="" method="post" id="trans_from">
                <p>Название:</p>
                <input type="text"  required name="name_trans_cash">
                <p>Дата:</p>
                <input type="text" id="add_data3" >
                <p>Cписать:</p>
                <select name="cash_trans_min" id="cash_trans_min" >
                </select>
                <p>Сумма:</p>
                <input type="number"  step="any" name="trans_balance_min" required >

                <p>Зачислить:</p>
                <select name="cash_trans_sum" id="cash_trans_sum"   >
                </select>
                <p>Курс:</p>
                <input type="number"  step="any" name="course" required  >
                <p>Сумма:</p>
                <input type="number"  step="any" name="trans_balance_sum" required >
                <p>Комментарий:</p>
                <textarea id="" cols="20" rows="5" name="comment_trans"></textarea><br><br>
                <input type="submit" value="Добавить" name="add_tr_sum" id="sub">
            </form>

        </div>
    </div>


</div>


<div id="dialog2" >
    <h3 align="center">Изменить </h3>
<div id="tabs2">
    <ul>
        <li><a href="#fragment-1">Расход</a></li>
        <li><a href="#fragment-2">Доход</a></li>
        <li><a href="#fragment-3">Перевод</a></li>
    </ul>
    <div id="fragment-1">
        <form action="" method="post" id="up_tr_form_minus">
            <p>Название:</p>
            <input type="text"  required name="up_name_tr_minus"><br><br>
            <p>Дата:</p>
            <input type="text" id="add_data4"><br><br>
            <p>Кошелек:</p>
            <select name="cash_minus" id="up_cash_minus_sel" required >
            </select>
            <br><br>


            <p>Сумма:</p>
            <input type="number" required step="any" name="up_balance_minus"> <br><br>
            <p>Комментарий:</p>
            <textarea id="up_comment" cols="20" rows="5" name="up_comment_minus"></textarea><br><br>
            <input type="submit" value="Изменить" name="add_tr_minus" id="up_sub">
        </form>
    </div>
    <div id="fragment-2">
        <form action="" method="post" id="up_tr_form_sum">
            <p>Название:</p>
            <input type="text"  required name="up_name_tr_sum"><br><br>
            <p>Дата:</p>
            <input type="text" id="add_data5"><br><br>
            <p>Кошелек:</p>
            <select name="cash_sum" id="up_cash_sum_sel" required >
            </select>
            <br><br>

            <p>Сумма:</p>
            <input type="number"  step="any" name="up_balance_sum"> <br><br>
            <p>Комментарий:</p>
            <textarea id="up_comment_sum" cols="20" rows="5" name="up_comment_sum"></textarea><br><br>
            <input type="submit" value="Изменить" name="add_tr_sum" id="up_sub">
        </form>

    </div>
    <div id="fragment-3">
        <form action="" method="post" id="up_trans_from">
            <p>Название:</p>
            <input type="text"  required name="up_name_trans_cash">
            <p>Дата:</p>
            <input type="text" id="add_data6" >
            <p>Cписать:</p>
            <select name="up_cash_trans_min" id="up_cash_trans_min" >
            </select>
            <p>Сумма:</p>
            <input type="number"  step="any" name="up_trans_balance_min" required >

            <p>Зачислить:</p>
            <select name="up_cash_trans_sum" id="up_cash_trans_sum"   >
            </select>
            <p>Курс:</p>
            <input type="number"  step="any" name="up_course" required  >
            <p>Сумма:</p>
            <input type="number"  step="any" name="up_trans_balance_sum" required >
            <p>Комментарий:</p>
            <textarea id="up_comment_trans" cols="20" rows="5" name="comment_trans"></textarea><br><br>
            <input type="submit" value="Изменить" name="add_tr_sum" id="sub">
        </form>

    </div>

</div>


</div>


<script>


</script>




<script>
/*
    $(".type").click(function(){
        tmp_id ="";
        ind = this.id;
        str = ind.split('');
        for(i=5;i<str.length;i++){
            tmp_id += str[i];
        }

        $.post("../controlers/control_tranzactions.php",
            { id_cash : tmp_id, on_cash : "1"},
            function(data){
               // data = JSON.parse(data);
               // alert(data);

                $("#content_test").append(data);
            }
        );

    });

*/

</script>

<?php
$part->script_links("../js/tranz.js");
$part->foot();
?>
