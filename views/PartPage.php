<?php
/**
 * Created by PhpStorm.
 * User: Константин
 * Date: 24.01.2018
 * Time: 23:00
 */



class PartPage
{
    public function head(){
        echo('
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
                
                <script src="../js/partpage.js"></script>
                
                
            </head>
            <body>
            
                <div class="display_one">
                    <div class="header">
                    <img src="../im/logo.png" alt="">
            
                    <ul type="none">
                        <li><a href="index.php" class="go_to" id="main">Главная</a></li>
                        <li><a href="tranzactions.php" class="go_to" id="tranz">Транзакции</a></li>
                        <li><a href="#" class="go_to">Планировщик</a></li>
                        <li><a href="report.php" class="go_to" id="report">Отчеты</a></li>
                        <li><a href="cash.php" class="go_to" id="cash">Счета</a></li>
                        <li><a href="#" class="go_to" id="il2">Настройки</a></li>
                        <li>
                        <button type="submit" name="exit" id="exit">Выйти</input>
                            
                        </li>
                    </ul>
                </div>
        ');
    }

    public function foot(){
        echo('
            <script src="../js/exit.js"></script>
            </body>
            </html>
        ');
    }

    public function arr_links(){
        $numargs = func_num_args();
        $arg_list = func_get_args();
        for ($i = 0; $i < $numargs; $i++) {
            echo "<link rel='stylesheet' href='../style/".$arg_list[$i]."'><br>";
        }
    }
    public function script_links(){
        $numargs = func_num_args();
        $arg_list = func_get_args();
        for ($i = 0; $i < $numargs; $i++) {
            echo "<script src=".$arg_list[$i]."></script><br>";
        }
    }

    public function cashContent($cash_info){ //вывот контекта определенного кошелька

    }


}
?>

