<?php
/**
 * Created by PhpStorm.
 * User: Константин
 * Date: 06.03.2018
 * Time: 1:31
 */

class LineChart
{
    public $name;
    public $date;
    public $balance;

    function  __construct($name, $date, $balance){
        $this->name=$name;
        $this->date=$date;
        $this->balance=$balance;
    }


}