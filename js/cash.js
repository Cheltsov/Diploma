$.post(
    "../controlers/control_cash.php",
    {wanna_info_cash : "1"},
    function(data){
        //alert(data);
        data = JSON.parse(data);
        for(i=4,n=2,id=0,b=5,t=3;i<data.length;i+=10,n+=10,id+=10,b+=10,t+=10){
            if(data[i]==1){
                $("#hands").append("<button class='type' id='"+data[id]+"'>"+data[n]+":"+data[b]+" ("+data[t]+") </button>");
            }
            if(data[i]==2){
                $("#cards").append("<button class='type' id='"+data[id]+"'>"+data[n]+":"+data[b]+" ("+data[t]+") </button>");
            }
        }
    }
);

$("#no").click(function(){
    $("#dialog3").dialog('close');
    //location.href = "http://localhost/develop_diploma/controlers/control_cash.php?id=" + id;
});

$("#del_cash").click(function(){
    $("#dialog").dialog('close');
    $("#dialog2").dialog('close');
    $("#dialog3").dialog('open');
});

$('#dialog3').dialog({
    autoOpen: false,
    show: {
        effect: 'drop',
        duration: 500
    },
    hide: {
        effect: 'clip',
        duration: 500
    },
    width: 350
});

/*
$("#up_cash").click(function(){
    $("#dialog").dialog('close');
    $("#dialog3").dialog('close');
    $("#dialog2").dialog('open');
});
*/
$('#dialog2').dialog({
    autoOpen: false,
    show: {
        effect: 'drop',
        duration: 500
    },
    hide: {
        effect: 'clip',
        duration: 500
    },
    width: 350
});




$("#add_cash").click(function(){
    $("#dialog3").dialog('close');
    $("#dialog2").dialog('close');
    $("#dialog").dialog('open');
});

$('#dialog').dialog({
    autoOpen: false,
    show: {
        effect: 'drop',
        duration: 500
    },
    hide: {
        effect: 'clip',
        duration: 500
    },
    width: 350
});



$( "#number1" )
    .selectmenu()
    .selectmenu( "menuWidget" )
    .addClass( "overflow" );

$( "#number1" ).selectmenu({
    width: 315
});

$( "#number2" )
    .selectmenu()
    .selectmenu( "menuWidget" )
    .addClass( "overflow" );

$( "#number2" ).selectmenu({
    width: 315,
    height:50
});

$( "#number3" )
    .selectmenu()
    .selectmenu( "menuWidget" )
    .addClass( "overflow" );

$( "#number3" ).selectmenu({
    width: 315
});

$( "#number4" )
    .selectmenu()
    .selectmenu( "menuWidget" )
    .addClass( "overflow" );

$( "#number4" ).selectmenu({
    width: 315,
    height:50,

});


function fun1(){
    document.getElementById('content').innerHTML = " <form action=''><input type='text' placeholder='Введите имя'/> <br><input type='text' placeholder='Введите email'/> <br><input type='text' placeholder='Введите phone'/> <br><input type='submit' value='Отправить' /></form>";
}

function fun2(){
    document.getElementById('content').innerHTML = "<div style='float:left'><button>Общий баланс <span >60 711,86p.</span></button><br /><button>Наличные <span >4 711,86p.</span></button><div ><button >Кошелек</button> <br><button >Кошелек</button> <br><button >Кошелек</button><br></div><button >Карты <span >4 711,86p.</span></button><div ><button >Visa</button> <br><button >MasterCard</button> <br><button >Банк</button><br></div></div>"+
        "<div style='float:right;margin-right:50px;margin-top:10px'><button class='open' onclick='func_add()'>Добавить</button> <br><button>Копировать</button><br><button>Изменить</button> <br><button>Удалить</button></div>";
}





function func_add(){
    $.fn.popup = function() {

        this.css('position', 'absolute').fadeIn();
        this.css("top", (($(window).height() - this.outerHeight()) / 2)  + "px");
        this.css("left", (($(window).width() - this.outerWidth()) / 2)  + "px");
        //открываем тень с эффектом:
        $('.backpopup').fadeIn();
    }
    $(document).ready(function(){ //при загрузке страницы:
        $('.open').click(function(){

            document.getElementById('fall').style.display = "block";
            /* document.body.style.overflow = 'hidden';*/
            $("html,body").css("overflow","hidden");

            //событие клик на нашу ссылку
            $('.popup-window').popup(); //запускаем функцию на наш блок с формой
        });
        $('.backpopup,.close').click(function(){
            $("html,body").css("overflow","auto");
            //событие клик на тень и крестик - закрываем окно и тень:
            $('.popup-window').fadeOut();
            $('.backpopup').fadeOut();
        });
    });
}


$( document ).ready(function() {

    $( "#number1" ).selectmenu({
        change: function( event, ui ) {
            if($( "#number1" ).val()==2){
                $("#dop_content1").append('Номер карты:<br><input type="number" name="num_card" maxlenght="16"><br><br>');
            }
            else{
                $("#dop_content1").empty();
            }
        }
    });
    $( "#number3" ).selectmenu({
        change: function( event, ui ) {
            if($( "#number3" ).val()==2){
                $("#dop_content3").append('Номер карты:<br><input type="number" name="new_num_card" maxlenght="16"><br><br>');
            }
            else{
                $("#dop_content3").empty();
            }
        }
    });
});



$(".type").bind("click", function(){
    var idbut = $(this).attr("id");
    $("#content").empty();
    mores(idbut);
});

$("#hands, #cards").on("click", ".type",function(){
    var idbut = $(this).attr("id");
    $("#content").empty();
    mores(idbut);
});


function mores(idbut){
    $.post("../controlers/control_cash.php", {id_but: idbut },
        function(data){
            data = JSON.parse(data);

            $("#content").append("<br><br>Название: "+data[2]+"<br><br>");
            $("#content").append("Валюта: "+data[3]+"<br><br>");
            $("#content").append("Баланс: "+data[5]+"<br><br>");
            $("#content").append("Дата создания: "+data[7]+"<br><br>");
            $("#content").append("Дата изменения: "+data[8]+"<br><br>");
            $("#content").append("Создатель: "+data[1]+"<br><br>");
            $("#content").append("Комментарий: "+data[6]+"<br><br><br>");
            $("#content").append("<div id='id_cash' style='display:none'>"+data[0]+"</div>");
        });
}



$("#yes").click(function(){
    $("#dialog3").dialog('close');
    var num_id = $("#id_cash").text();
    if(num_id!=''){
        $.post("../controlers/control_cash.php",
            {num_id : num_id},
            function(data){
                location.reload(true);
                //alert("Кошелек: "+data+" был удален успешно!");

            });
    }
    else {
        alert("Выберите кошелек для удаления");
    }
});

$("#up_cash").click(function(){
    var num_id = $("#id_cash").text();
    if(num_id!=''){
        $.post("../controlers/control_cash.php",{up_cash:num_id},
            function(data){
                //$("#content").append(data);
                dataj = JSON.parse(data);
                $("#dialog").dialog('close');
                $("#dialog3").dialog('close');
                $("#dialog2").dialog('open');

                $("#name_cash").val(dataj[2]);
                $("#number4").val(dataj[3]).selectmenu('refresh');
                $("#number3").val(dataj[4]).selectmenu('refresh');
                $("#balance").val(dataj[5]);
                $("#comment").val(dataj[6]);
                if($( "#number3" ).val()==2){
                    //$("#dop_content3").empty();
                    $("#dop_content3").html('Номер карты:<br><input type="number" name="num_card" lenght="16"><br><br>');
                    $("input[name='num_card']").val(dataj[9]);
                }

            });
    }
    else alert("Выберите кошелек!");

});

$("#update_form").submit(function() {

    $.post("../controlers/control_cash.php",
        {
            newname_cash: $("input[name='new_name_cash']").val(),

            newtype_cash:$("select[name='new_type_cash']").val(),

            newnum_card:$("input[name='num_card']").val(),

            newtype_money:$("select[name='new_type_money']").val(),

            newbalance:$("input[name='new_balance']").val(),

            newcomment:$("textarea[name='new_comment']").val(),

            id_cash: $("#id_cash").text()
        },
        function(data){
            alert("Кошелек был изменен!");
        }

    );
});

$( "#number4" ).on( "selectmenuopen", function( event, ui ) {
    last_course = $("#number4").val();
} );

$( "#number4" ).on( "selectmenuchange", function( event, ui ) {

    $.post("../controlers/control_cash.php",
        {
            last_course : last_course,
            val : $("#number4").val(),
            bal : $("input[name='new_balance']").val()
        },
        function(data){
            data =  parseFloat(data).toFixed(2);
            $("#balance").val(data);
        });
} );