<?php
if(!isset($_COOKIE['SingIN'])){
    header('Location:../index.php');
}
require "../controlers/control_main_page.php";
require "partpage.php";

$part = new partPage();


echo("<title>Ledger - Главная</title>");
$part->head(); // Построение шапки страницы

$part->arr_links("mainPage.css"); //подключить массив фалов стилей

$part->script_links("../js/partpage.js"); //подключить массив фалов javascript


?>
<style>
    table{
        margin-top:100px;
    }
    td{
        width:80px;
        height: 50px;
        text-align: center;
    }
</style>



<script>







</script>
<?php
    $part->foot();// Построение подвала страницы
?>
