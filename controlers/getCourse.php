<?php


function getCourse(){
    if (!defined('LINK'))
        define("LINK", 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=11');
    $data = file_get_contents(LINK);
    $courses = json_decode($data, true);
    return $courses;
}

function getOneCourse($val){
    $course = getCourse();
    switch($val){
        case "USD": return $course[0]; break;
        case "EUR": return $course[1]; break;
        case "RUR": return $course[2]; break;
        case "BTC": return $course[3]; break;
    }
}

//print_r(getOneCourse("EUR"));