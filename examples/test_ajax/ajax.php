<?php
/**
 * Created by PhpStorm.
 * User: Константин
 * Date: 04.02.2018
 * Time: 13:55
 */
if($_POST["country"] == 1){
    echo json_encode(array("1" => "Вашингтон", "2" => "Сиэтл"));
}
else
    if($_POST["country"] == 2){
        echo json_encode(array("3" => "Париж", "4" => "Мехл"));
    }