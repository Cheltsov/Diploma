<?php
/**
 * Created by PhpStorm.
 * User: Константин
 * Date: 28.01.2018
 * Time: 18:04
 */

class moveTo
{
    public function moveToIndex(){
        echo("<script>window.location = '../index.php';</script>");
    }

    public function moveToMainPage(){
        echo("<script>window.location = '../views/index.php';</script>");
    }
    public function ec(){
        echo("true");
    }
}