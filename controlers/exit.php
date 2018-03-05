<?php
/**
 * Created by PhpStorm.
 * User: Константин
 * Date: 18.02.2018
 * Time: 23:49
 */

if(isset($_POST['exit'])){
   setcookie("SingIN", "", time()-3600, "/");
}