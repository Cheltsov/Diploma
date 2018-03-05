<?php if(!isset($_SESSION)){
    session_start();
    if(isset($_COOKIE['SingIN'])){
        header("Location: views/index.php");
    }
}?>
<link rel="stylesheet" href="style/main.css">



<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Diploma</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="libs/bootstrap/bootstrap-grid-3.3.1.min.css">
    <link rel="stylesheet" href="libs/font-awesome-4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/media.css">
    <link rel="stylesheet" href="style/main.css">
	<script src="js/file.js"></script>
    <link rel="stylesheet" href="libs/animate.css">
    <script src="libs/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxtransport-xdomainrequest/1.0.4/jquery.xdomainrequest.min.js"></script>

<script>




/*
    $(document).ready(function(){

        $("#ding").onclick(function(){
            $.ajax({
                type : 'GET',
                url : 'controlers/logIn.php',
                data : { on_fro: $(this).val() },
                success : $("#on2_for").html
            });
        })
});*/





 /*   $("#on_fro").onclick(function(){
        $.ajax({
            url: 'controlers/logIn.php',             // указываем URL и
            dataType : "php",
            //data: "first_name=admin&password=111",
            data: ({id : "login", "password"}),                  // тип загружаемых данных
            success: function (data, textStatus) { // вешаем свой обработчик на функцию success
                $.each(data, function(i, val) {    // обрабатываем полученные данные

                });
            }
        });
    });*/

</script>
</head>
<body>
<?php require "controlers/displayOnOff.php" ?>

    <div class="display_one_link" style="position: relative; top:-70px;"></div>
    <div class="display_one">
	    <div class="header">
        <img src="im/logo.png" alt="">

		<ul type="none">
			<li><a href=".display_one_link" class="go_to">Главная</a></li>
			<li><a href=".display_two_link" class="go_to">Возможности</a></li>
			<li><a href=".display_four" class="go_to">Отзывы</a></li>
		</ul>

        <div id="aut_reg">
           <!-- <button id="reg" onclick="func()">Регистрация</a></button>--><!--class="open"-->

            <a href=".display_one_link" class="go_to"><button id="but_auto" onclick="func2()">Войти</button></a>

        </div>

    </div>


    <!--TXT-->
    <div class="onedis_text">
        <div class="texr_and_but">
            <h3>Веб сервис <br> доступный для любой платформы</h3>

            <h1>Отслеживание доходов <br>и расходов семьи <br>где бы вы не находились</h1>

            <h5>бесплатное приложение для управления семейным бюджетом</h5>


            <button onclick="func()">Стать участником</button>
        </div>

        <div class="text_and_form">
            <div id="on_fro" style="display: none;" class="wow fadeInRightBig">
                <p class="text_auto">Авторизируйтесь</p>

                <form action="controlers/logIn.php" method="POST" class="form1" id="loginUp">
                    <input type="text" placeholder="Введите логин" required name="first_name" maxlength="50" id="login"> <br>
                    <input type="password"  placeholder="Введите пароль" required name="pass" maxlength="30" id="password"> <br>
                    <input type="submit"  value="Войти" name="sing" id='ding'>
                </form>
            </div>


            <div id="on2_fro" style="display: none;" class="wow fadeInRightBig">
                <p class="text_auto">Зарегистрируйтесь</p>

                <form action="controlers/logIn.php" id="logUP" method="POST" class="form1" onsubmit="funcd()">
                    <input type="text" placeholder="Введите логин" required name="login" maxlength="50" > <br>
                    <input type="email" placeholder="Введите email" required name="email" maxlength="50" > <br>
                    <input type="password" id="pas1" placeholder="Введите пароль" required name="password" maxlength="30"> <br>
                    <input type="password" id="pas2" placeholder="Повторите пароль" required name="second_password" maxlength="30"> <br>
                    <input type="submit"  value="Отправить" name="singIn" id="logUp">
                </form>

                <div id="dificultPas" style="display: none; width:100px; position: absolute; top:100px; border: 1px solid red; color:white">
                    Пароли не одинаковые
                </div>
            </div>

            <div id="on3_fro" style="display: none;" class="wow fadeInRightBig">
                <p class="text_auto">Забыли пароль?</p>

                <form action="controlers/logIn.php" method="POST" class="form1">
                    <input type="email" placeholder="Введите email" required name="email" maxlength="50" > <br>
                    <input type="submit"  value="Обновить пароль" name="singNew">
                </form>
            </div>

        </div>

    </div>

</div>




<div class="display_two_link" style="position: relative; top:-30px;"></div>

<div class="display_two">

    <h2>Возможности программного продукта</h2>

    <div class="line_dis_two">

        <div class="bloks_line_dis_two">
            <img src="im/im2.png" alt="" >
            <h3>Пользователи и права доступа</h3>
            <p>Вы сможете вести несколько пользователей, это позволяет отслеживать, кто какую запись создал, защищать свои записи от изменений и скрывать их от других пользователей.</p>
        </div>
        <div class="bloks_line_dis_two">
            <img src="im/im3.jpg" alt="" >
            <h3>Планировщик</h3>
            <p>Ledger легко автоматизировать с помощью планировщика. Регулярные транзакции будут занесены программой самостоятельно без участия пользователя, или с его подтверждением, если это необходимо.</p>
        </div>

        <div class="bloks_line_dis_two">
            <img src="im/Im4.png" alt="" >
            <h3>Мультивалютность</h3>
            <p>В программе для учета расходов и доходов доступны какие валюты как доллары, евро, рубли, гривны. </p>

        </div>

    </div>
    <div class="line_dis_two">

            <div class="bloks_line_dis_two" >
                <img src="im/im6.png" alt="" >
                <h3>Бюджет</h3>
                <p>Вы сможете легко и наглядно отслеживать прогресс в достижении ваших финансовых целей и контролировать расходы.</p>
            </div>

            <div class="bloks_line_dis_two">
                <img src="im/im5.png" alt="" >
                <h3>Инструменты для работы с данными</h3>
                <p>Быстрый учет домашних финансов: для ввода расхода просто наберите несколько первых букв и выберите транзакцию из списка.</p>

            </div>
            <div class="bloks_line_dis_two">
                <img src="im/money.png" alt="" >
                <h3>Учет долгов и кредитов</h3>
                <p>Вы можете брать кредиты и давать деньги в долг, это будет отображено и учтено в программе для учета финансов. Выплачивать долг можно с любого счета и в любой валюте.</p>

            </div>
    </div>

</div>

<div class="display_three">
    <h2>Начните сейчас!</h2>

    <a href=".display_one_link" class="go_to"><button onclick="func()">Зарегистрироваться</button></a>

</div>

<div class="display_four">



    <div class="for_nine-screen" style="position: relative; top: -110px"></div>
    <div class="nine-screen">
        <h2 id="nine_text">Отзывы клиентов о нашей работе</h2>
        <div class='nine_flex'>
            <div class="arow-six left_two" style="margin-right: 50px;float:left; background: url(im/arow_left.png); "></div>

                <div class="container-wrap_two">
                    <div class="container_two">


                        <div class="block_two wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <img src="im/person5.png" alt="">
                            <p class="name">Михаил Шевчик</p>
                            <p class="data">23.12.2016</p>
                            <p class="text_pastdata">Рыбатекст используется дизайнерами, проектировщиками и фронтендерами, когда нужно быстро заполнить<br>макеты или прототипы содержимым. Это тестовый контент, который не должен нести никакого смысла, <br>лишь показать наличие самого текста или продемонстрировать типографику в деле.</p>
                        </div>
                        <div class="block_two">
                            <img src="im/person2.png" alt="">
                            <p class="name">Александр Мишук</p>
                            <p class="data">15.10.2016</p>
                            <p class="text_pastdata">Срочно требовался одностраничник, до этого никогда с лендингами не работал, на сайте конверсии практически не было. Сделано все быстро и четко. Лендос работает, клиентов ведет.</p>
                        </div>
                        <div class="block_two">
                            <img src="im/person3.png" alt="">
                            <p class="name">Алексей Никулин</p>
                            <p class="data">28.03.2017</p>
                            <p class="text_pastdata">Лендинг был делан в срок - 1 неделя. Дизайн крутой. Показал свой LP друзьям-предпринимателям, оценили на 5, по пятибальной шкале. Конверсия по факту 5-7%.</p>
                        </div>
                        <div class="block_two">
                            <img src="im/person4.png" alt="">
                            <p class="name">Юрий Соколов</p>
                            <p class="data">06.04.2017</p>
                            <p class="text_pastdata">Бизнес-аналитики общались со мной более часа и только после этого я принял решение работать с этой компанией, т.к. увидел реальную помощь и профессионализм. <br>Сроки исполнения идеальные, команда подобрана четко! <br>Результат идеальный, глядя на мой лендос, знакомые воспользовались услугами этой компании.</p>
                        </div>
                        <div class="block_two">
                            <img src="im/person5.png" alt="">
                            <p class="name">Виталий Горошко</p>
                            <p class="data">02.10.2017</p>
                            <p class="text_pastdata">Мне изготовили лендинг, который в первую неделю показал конверсию в 10,71% благодаря этому заявок стало в 3 раза больше прежнего. Особая благодарность за внимание к деталям и ответственное устранение всех замечаний.</p>
                        </div>

                    </div>
                </div>

            <div class="arow-six right_two" style="margin-left: 50px;float:left; background: url(im/arow_right.png); "></div>
        </div>

    </div>
</div>

<div class="foot">
    <img src="im/logo.png" alt="" id="log">

    <p >© 2018, Онлайн бухгалтерия для малого бизнеса «Ledger».</p>

    <div class="foo_ul">
        <a href=""><img src="im/facebook.png" alt=""></a>
        <a href=""><img src="im/github.png" alt=""></a>
        <a href=""><img src="im/mail.png" alt=""></a>
    </div>

</div>







<script src="js/move.js"></script>
<script>
    var forr3 = document.getElementById("on3_fro");
    var forr2 = document.getElementById("on2_fro");
    var forr1 = document.getElementById("on_fro");
    function func(){
        forr1.style.display = "none";
        forr2.style.display = "block";
        forr3.style.display = "none";
    }
    function func2(){
        forr2.style.display = "none";
        forr1.style.display = "block";
        forr3.style.display = "none";
    }
    new WOW().init();

    $('#logUP').submit( function() {

        $.ajax({
            type: 'POST',
            url: 'controlers/logIn.php',
            data: $(this).serialize(),

        }).done(function(data){
            alert('Пользователь был успешно добавлен!');
            //alert(data);
            forr1.style.display = "block";
            forr2.style.display = "none";
            forr3.style.display = "none";
        });
        return false;

    });

    $('#loginUp').submit( function() {

        $.ajax({
            type: 'POST',
            url: 'controlers/logIn.php',
            data: $(this).serialize(),

        }).done(function(data){
            if(data==1){
                window.location = "views/index.php";
            }
            else{
                alert("Не правилный логин или пароль");
                forr1.style.display = "none";
                forr2.style.display = "none";
                forr3.style.display = "block";
            }


        });
        return false;

    });




</script>


</body>
</html>


