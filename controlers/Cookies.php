<?php
require "moveTo.php";

class Cookies extends moveTo
{

    function checkCookie($name){
        if(!isset($_COOKIE[$name])){
            header('Location:../index.php');
        }
    }

}
