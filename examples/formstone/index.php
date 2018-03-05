<?php

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Социальный проект</title>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/checkbox.css"/>

    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/core.js"></script>
    <script src="js/touch.js"></script>
    <script src="js/checkbox.js"></script>

    <script>

        jQuery("document").ready(function($) {

            /*$("input[type=radio]").checkbox({

                //customClass:'myclass',
                //toggle:true,
                /*labels: {
                    on:'Включить',
                    off:'Выключить'
                }

            });
*/
            $("input[type=radio]").checkbox('enable');

        });

    </script>

    <style>
        span{
            margin-right:30px;
        }
        .wrap{
            font-size:14pt;
        }
        /*label{
            float:left;
        }*/
        .blo{
            margin-bottom:40px;
        }
        label {
            color: black;

        }

    </style>
</head>
<body>
<div class="wrap">

    <h2>Социальный опрос на тему: "Отношение к другим людям"</h2>
    <p>
        В нашем социальном вопросе другие люди - это те люди, которые отличаются по внешним качества от большей массы людей
        (Фрики, Инвалиды, гендеры, психическо больные)
    </p>

    <div class="blo">
        <span>1. Пол</span>
        <input type="radio" name="check1" id="id1" value="1" />
        <label for="id1" >Мужской</label>

        <input type="radio" name="check1" id="id2" value="2" />
        <label for="id2" >Женский</label>

        <input type="radio" name="check1" id="id3" value="3" />
        <label for="id3" >Неопределен</label>
    </div>
    <div class="blo">
        <span>2. Возраст</span>
        <input type="radio" name="check2" id="id4" value="1" />
        <label for="id1" >до 18</label>

        <input type="radio" name="check2" id="id5" value="2" />
        <label for="id2" >19-30</label>

        <input type="radio" name="check2" id="id6" value="3" />
        <label for="id3" >31-45</label>

        <input type="radio" name="check2" id="id7" value="4" />
        <label for="id3" >46-60</label>

        <input type="radio" name="check2" id="id8" value="5" />
        <label for="id3" >60+</label>
    </div>

    <div class="blo">
        <span>3. Есть ли среди Вашего окружения такие люди?</span>
        <input type="radio" name="check1" id="id9" value="1" />
        <label for="id1" >Да</label>

        <input type="radio" name="check1" id="id10" value="2" />
        <label for="id2" >Нет</label>

        <input type="radio" name="check1" id="id11" value="3" />
        <label for="id3" >Не знаю</label>
    </div>
    <div class="blo">
        <span>4. Ваше отношение к "другим" людям?</span>
        <input type="radio" name="check1" id="id12" value="1" />
        <label for="id1" >Крайне негативное</label>

        <input type="radio" name="check1" id="id13" value="2" />
        <label for="id2" >Негативное</label>

        <input type="radio" name="check1" id="id14" value="3" />
        <label for="id3" >Нейтральное</label>

        <input type="radio" name="check1" id="id15" value="4" />
        <label for="id3" >Не считаю их другими</label>

        <input type="radio" name="check1" id="id16" value="5" />
        <label for="id3" >Другой</label>
    </div>

    <div class="blo">
        <span>5. Комфортно ли Вам находится рядом с "другими" людьми?</span>
        <input type="radio" name="check1" id="id12" value="1" />
        <label for="id1" >Да</label>

        <input type="radio" name="check1" id="id13" value="2" />
        <label for="id2" >Нет</label>

        <input type="radio" name="check1" id="id14" value="3" />
        <label for="id3" >Нейтрально</label>

        <input type="radio" name="check1" id="id16" value="5" />
        <label for="id3" >Не определился(-ась)</label>

        <input type="radio" name="check1" id="id16" value="5" />
        <label for="id3" >Другой</label>
    </div>

    <div class="blo">
        <span>6. Счиатете ли Вы проблемой для общества присутствие "других"?</span>
        <input type="radio" name="check1" id="id12" value="1" />
        <label for="id1" >Да</label>

        <input type="radio" name="check1" id="id13" value="2" />
        <label for="id2" >Нет</label>

        <input type="radio" name="check1" id="id14" value="3" />
        <label for="id3" >Не могу ответить</label>

        <input type="radio" name="check1" id="id16" value="5" />
        <label for="id3" >Другой</label>
    </div>

</div>

</body>
</html>
