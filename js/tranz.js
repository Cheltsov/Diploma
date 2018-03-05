$(document).ready(function(){
    $.post(
        "../controlers/control_tranzactions.php",
        {wanna_info_cash : "1"},
        function(data){
            data = JSON.parse(data);
            for(i=4,n=2,id=0,b=5,t=3;i<data.length;i+=10,n+=10,id+=10,b+=10,t+=10){
                if(data[i]==1){
                    $("#hands").append("<button class='type' id='cash_"+data[id]+"'>"+data[n]+":"+data[b]+" ("+data[t]+") </button>");
                }
                if(data[i]==2){
                    $("#cards").append("<button class='type' id='cash_"+data[id]+"'>"+data[n]+":"+data[b]+" ("+data[t]+") </button>");
                }
            }

        }
    );


    $("#hands, #cards").on("click", ".type",function(){
        $("#minTable").empty();
        tmp_id = "";
        index ="";
        var idbut = $(this).attr("id");
        id_cash = idbut.slice(5);
        $.post("../controlers/control_tranzactions.php",
            {
                wanna_tr_min_fromID : "1",
                cash_index : id_cash
            },
            function(data){
                //alert(data);
                $("#minTable").append("<tr><th>Имя</th><th>Кошелек</th><th>Сумма</th><th>Коммент</th><th>Пользователь</th><th>Дата</th></tr>");
                data = JSON.parse(data);
                for(i=1,j=2,a=3,b=4,c=5,d=6,il=0;i<data.length;i+=7,j+=7,a+=7,b+=7,c+=7,d+=7,il+=7){
                    $("#minTable").append("<tr id='"+data[il]+"' class='col'>" +"<td id='name'>"+data[i]+"&nbsp</td>" + "<td id='cash'>"+data[j]+"</td>"+ "<td>"+data[a]+"</td>"+  "<td>"+data[b]+"</td>" + "<td>"+data[c]+"</td>" +  "<td>"+data[d]+"</td>"+ "</tr>");
                }

            });
        $("#plusTable").empty();
        $.post("../controlers/control_tranzactions.php",
            {
                wanna_tr_plus_fromID : "1",
                cash_index : id_cash
            },
            function(data){
                $("#plusTable").append("<tr><th>Имя</th><th>Кошелек</th><th>Сумма</th><th>Коммент</th><th>Пользователь</th><th>Дата</th></tr>");
                data = JSON.parse(data);
                for(i=1,j=2,a=3,b=4,c=5,d=6,il=0;i<data.length;i+=7,j+=7,a+=7,b+=7,c+=7,d+=7,il+=7){
                    $("#plusTable").append("<tr id='"+data[il]+"' class='col'>" +"<td id='name'>"+data[i]+"&nbsp</td>" + "<td id='cash'>"+data[j]+"</td>"+ "<td>"+data[a]+"</td>"+  "<td>"+data[b]+"</td>" + "<td>"+data[c]+"</td>" +  "<td>"+data[d]+"</td>"+ "</tr>");
                }
            });
        $("#transTable").empty();
        $.post("../controlers/control_tranzactions.php",
            {
                wanna_tr_trans_fromID : "1",
                cash_index : id_cash,
            },
            function(data){
                $("#transTable").append("<tr><th>Имя</th><th>Кошелек1</th><th>Снято</th><th>Кошелек2</th><th>Зачислено</th><th>Комментарий</th><th>Пользователь</th><th>Дата</th></tr>");
                data = JSON.parse(data);
                for(i=1,j=2,a=3,b=4,c=5,d=6,e=7,f=8,il=0;i<data.length;i+=9,j+=9,a+=9,b+=9,c+=9,d+=9,il+=9,e+=9,f+=9){
                    $("#transTable").append("<tr id='ts"+data[il]+"' class='col'>" +"<td id='name'>"+data[i]+"&nbsp</td>" + "<td id='cash'>"+data[a]+"</td>"+ "<td>"+data[b]+"</td>"+  "<td>"+data[c]+"</td>" + "<td>"+data[d]+"</td>" +  "<td>"+data[e]+"</td>"+ "<td>"+data[f]+"</td>"+"<td>"+data[j]+"</td>"+"</tr>");
                }
            }
        );
    });
});

$("#add_tr").click(function(){

    $("#dialog2").dialog('close');
    $("#dialog3").dialog('close');
    $.post("../controlers/control_tranzactions.php",
        {want_id_cash: "1"},

        function(data){
            data = JSON.parse(data);
            for(i=0,j=3,k=6,vl=1;i<data.length;i+=7,j+=7,k+=7,vl+=7){ // получить имя кошльков
                $("#cash_minus_sel").append("<option value='"+data[k]+"'>"+data[i]+" ("+data[j]+" "+data[vl]+")</option>").selectmenu('refresh');
                $("#cash_sum_sel").append("<option value='"+data[k]+"'>"+data[i]+" ("+data[j]+" "+data[vl]+")</option>").selectmenu('refresh');
                $("#cash_trans_sum").append("<option value='"+data[k]+"'>"+data[i]+" ("+data[j]+" "+data[vl]+")</option>").selectmenu('refresh');
                $("#cash_trans_min").append("<option value='"+data[k]+"'>"+data[i]+" ("+data[j]+" "+data[vl]+")</option>").selectmenu('refresh');
            }
        });

    $("option").remove();

    $("#dialog").dialog('open');

});

$(function(){
    // меню
    $("#menu h3").click(function() {
        $(this).next().toggle();
        return false;
    }).next().show("slow");
    // открываем все
    $("a.open").click(function(){
        $("#menu ul").show("slow");
    });
    // закрываем все
    $("a.close").click(function(){
        $("#menu ul").hide("slow");
    });
});


$("#add_data").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    time_24hr: true
});

$("#add_data2").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    time_24hr: true
});
$("#add_data3").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    time_24hr: true
});
$("#add_data4").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    time_24hr: true
});
$("#add_data5").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    time_24hr: true
});
$("#add_data6").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    time_24hr: true
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
    width: 500
});

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
    width: 500,
    close: function( event, ui ) {
        $("input[name='up_name_tr_minus']").val("");
        $("#add_data4").val("");
        $("#up_cash_minus_sel").val("").selectmenu('refresh');
        $("input[name='up_balance_minus']").val("");
        $("#up_comment").val("");
        $("input[name='up_name_tr_sum']").val("");
        $("#add_data5").val("");
        $("#up_cash_sum_sel").val("").selectmenu('refresh');
        $("input[name='up_balance_sum']").val("");
        $("#up_comment_sum").val("");

        $("input[name='name_trans_cash']").val("");
        $("#add_data6").val("");
        $("#up_cash_trans_min").val("").selectmenu('refresh');
        $("input[name='trans_balance_min']").val("");
        $("#up_cash_trans_sum").val("").selectmenu('refresh');
        $("input[name='course']").val("");
        $("input[name='trans_balance_sum']").val("");
        $("input[name='comment_trans']").val("");
        tmp_id = "";
        index ="";
    }
});

$(document).ready(function(){
    $( "#tabs" ).tabs({
        active: 0,
        event: "click",
        heightStyle: 'content'
    });

    $( "#tabs2" ).tabs({
        active: 0,
        event: "click",
        heightStyle: 'content'
    });
});

$( "#cash_minus_sel" )
    .selectmenu()
    .selectmenu( "menuWidget" )
    .addClass( "overflow" );

$( "#cash_minus_sel" ).selectmenu({
    width: 315
});

$( "#cash_sum_sel" )
    .selectmenu()
    .selectmenu( "menuWidget" )
    .addClass( "overflow" );

$( "#cash_sum_sel" ).selectmenu({
    width: 315
});

$( "#cash_trans_min" )
    .selectmenu()
    .selectmenu( "menuWidget" )
    .addClass( "overflow" );

$( "#cash_trans_min" ).selectmenu({
    width: 315
});

$( "#cash_trans_sum" )
    .selectmenu()
    .selectmenu( "menuWidget" )
    .addClass( "overflow" );

$( "#cash_trans_sum" ).selectmenu({
    width: 315
});
$( "#up_cash_minus_sel" )
    .selectmenu()
    .selectmenu( "menuWidget" )
    .addClass( "overflow" );

$( "#up_cash_minus_sel" ).selectmenu({
    width: 315
});

$( "#up_cash_sum_sel" )
    .selectmenu()
    .selectmenu( "menuWidget" )
    .addClass( "overflow" );

$( "#up_cash_sum_sel" ).selectmenu({
    width: 315
});

$( "#up_cash_trans_min" )
    .selectmenu()
    .selectmenu( "menuWidget" )
    .addClass( "overflow" );

$( "#up_cash_trans_min" ).selectmenu({
    width: 315
});

$( "#up_cash_trans_sum" )
    .selectmenu()
    .selectmenu( "menuWidget" )
    .addClass( "overflow" );

$( "#up_cash_trans_sum" ).selectmenu({
    width: 315
});








$("#all_bal").click(function(){ // заполнение таблицы при нажатии кнопки ВСЕ!
    $("#minTable").empty();
    $.post("../controlers/control_tranzactions.php",
        {
            wanna_tr_min : "1"
        },
        function(data){
        //alert(data);
            $("#minTable").append("<tr><th>Имя</th><th>Кошелек</th><th>Сумма</th><th>Коммент</th><th>Пользователь</th><th>Дата</th></tr>");
       data = JSON.parse(data);
            for(i=1,j=2,a=3,b=4,c=5,d=6,il=0;i<data.length;i+=7,j+=7,a+=7,b+=7,c+=7,d+=7,il+=7){
                $("#minTable").append("<tr id='"+data[il]+"' class='col'>" +"<td id='name'>"+data[i]+"&nbsp</td>" + "<td id='cash'>"+data[j]+"</td>"+ "<td>"+data[a]+"</td>"+  "<td>"+data[b]+"</td>" + "<td>"+data[c]+"</td>" +  "<td>"+data[d]+"</td>"+ "</tr>");
            }
        });
    $("#plusTable").empty();
    $.post("../controlers/control_tranzactions.php",
        {
            wanna_tr_plus : "1"
        },
        function(data){
            $("#plusTable").append("<tr><th>Имя</th><th>Кошелек</th><th>Сумма</th><th>Коммент</th><th>Пользователь</th><th>Дата</th></tr>");
            data = JSON.parse(data);
            for(i=1,j=2,a=3,b=4,c=5,d=6,il=0;i<data.length;i+=7,j+=7,a+=7,b+=7,c+=7,d+=7,il+=7){
                $("#plusTable").append("<tr id='"+data[il]+"' class='col'>" +"<td id='name'>"+data[i]+"&nbsp</td>" + "<td id='cash'>"+data[j]+"</td>"+ "<td>"+data[a]+"</td>"+  "<td>"+data[b]+"</td>" + "<td>"+data[c]+"</td>" +  "<td>"+data[d]+"</td>"+ "</tr>");

            }
        });
    $("#transTable").empty();
    $.post("../controlers/control_tranzactions.php",
        {
            wanna_tr_trans : "1"
        },
        function(data){
            //alert(data);
            $("#transTable").append("<tr><th>Имя</th><th>Кошелек1</th><th>Снято</th><th>Кошелек2</th><th>Зачислено</th><th>Комментарий</th><th>Пользователь</th><th>Дата</th></tr>");
            data = JSON.parse(data);
            for(i=1,j=2,a=3,b=4,c=5,d=6,e=7,f=8,il=0;i<data.length;i+=9,j+=9,a+=9,b+=9,c+=9,d+=9,il+=9,e+=9,f+=9){
                $("#transTable").append("<tr id='ts"+data[il]+"' class='col'>" +"<td id='name'>"+data[i]+"&nbsp</td>" + "<td id='cash'>"+data[a]+"</td>"+ "<td>"+data[b]+"</td>"+  "<td>"+data[c]+"</td>" + "<td>"+data[d]+"</td>" +  "<td>"+data[e]+"</td>"+ "<td>"+data[f]+"</td>"+"<td>"+data[j]+"</td>"+"</tr>");
            }
        }
    );
});


$("#tr_form_minus").submit(function(){

    $.post("../controlers/control_tranzactions.php",
        {
            name_trMin: $("input[name='name_tr_minus']").val(),
            cash_trMin: $("select[name='cash_minus']").val(),
            balance_trMin: $("input[name='balance_minus']").val(),
            comment_trMin: $("textarea[name='comment_minus']").val(),
            data_trMin : $("#add_data").val()
        },
        function(data){
            alert("Транзакция успешно добавлена!");
        });
});

$('#tr_form_sum').submit(function(){

    $.post("../controlers/control_tranzactions.php",
        {
            name_trSum: $("input[name='name_tr_sum']").val(),
            cash_trSum: $("select[name='cash_sum']").val(),
            balance_trSum: $("input[name='balance_sum']").val(),
            comment_trSum: $("textarea[name='comment_sum']").val(),
            data_trSum : $("#add_data2").val()
        },
        function(data){
            alert("Транзакция успешно добавлена!");
        });
});


$(document).ready(function() {
        tmp_id="";
        index="";

    $(" #plusTable").on('click', ".col", function(){
        $(".col").css("backgroundColor", 'white');
       // index = "";
        index= this.id;
        flag_ts = "000";
        what_tr = "plus";
        document.getElementById(index).style.backgroundColor = "lightblue";
    });

    $("#minTable").on('click', ".col", function(){
        $(".col").css("backgroundColor", 'white');
        //index = "";
        index= this.id;
        flag_ts = "000";
        what_tr = "min";
        document.getElementById(index).style.backgroundColor = "lightblue";
    });

    $("#transTable").on('click', ".col", function(){
        $(".col").css("backgroundColor", 'white');
        tmp_id ="";
        index = "";
        string =  this.id;
        str = string.split('');
        for(i=2;i<str.length;i++){
            tmp_id += str[i];
        }
        flag_ts = "111";
        document.getElementById(string).style.backgroundColor = "lightblue";

    });


    $("#del_tr").click(function(){
        if(index=="" && tmp_id ==""){
            alert("Выберите транзакцию!");
            return;
        }
        $("#dialog").dialog('close');
        $("#dialog2").dialog('close');
        //$("#dialog_del2").dialog('close');

        if($(".col").css("backgroundColor") != "rgba(0, 0, 0, 0)")  {

            $("#dialog").dialog('close');

            $("#dialog3").dialog('open');

            $("#yes").click(function(){
                $("#dialog3").dialog('close');

                if(flag_ts == "111"){
                     $.post("../controlers/control_tranzactions.php", {
                            del_trans : "1",
                            index_trans : tmp_id
                        },
                        function(data){
                            location.reload(true);
                            alert(data);
                        }
                    );
                    flag_ts = "";
                }

                if(flag_ts == "000"){
                    $.post("../controlers/control_tranzactions.php", {del_tr: "1", index: index},
                        function(data){
                            location.reload(true);
                            alert(data);
                        }
                    );
                    flag_ts="";
                }

            });

            $("#no").click(function(){
                $("#dialog3").dialog('close');
            });
        }
        else alert("Выберите транзакцию");


    });



} );

$('#dialog3').dialog({
    autoOpen: false,
    show: {effect: 'drop', duration: 500},
    hide: {effect: 'clip', duration: 500},
    width: 350
});




$("#trans_from").submit(function(){

    $.post(
        "../controlers/control_tranzactions.php",
        {
            name_trans : $("input[name='name_trans_cash']").val(),
            date_trans : $("#add_data3").val(),
            cash_min_trans : $("#cash_trans_min").val(),
            balanc_min_trans : $("input[name='trans_balance_min']").val(),
            course_trans : $("input[name='course']").val(),
            cash_sum_trans : $("#cash_trans_sum").val(),
            balanc_sum_trans : $("input[name='trans_balance_sum']").val(),
            comment_trans : $("textarea[name='comment_trans']").val()
        },
        function(data){
            alert(data);
        }
    );
});

$("#cash_trans_sum").on("selectmenuchange", function(event,ui){
    BalanceNew();

});
$("#cash_trans_min").on("selectmenuchange", function(event,ui){
    BalanceNew();
});

$("input[name='trans_balance_min']").keyup(function(){
    BalanceNew();
});

$("input[name='course']").keyup(function(){
    BalanceNew();
});



function BalanceNew(){

    last_cash = $("#cash_trans_min").val();
    new_cash = $("#cash_trans_sum").val();
    course = $("input[name='course']").val();

    $.post("../controlers/control_tranzactions.php",
        {
            getNewbalance : "1",
            last_cash : last_cash,
            new_cash : new_cash,
            course : course,
            balance : $("input[name='trans_balance_min']").val()
        },
        function(data){
            //alert(data);
            data = JSON.parse(data);
            $("input[name='course']").val(data[0].toFixed(2));
            $("input[name='trans_balance_sum']").val(data[1].toFixed(2));
        }

    );
}


$("#up_tr").click(function(){
    if(index=="" && tmp_id ==""){
        alert("Выберите транзакцию!");
        return;
    }
    $("#dialog3").dialog('close');
    $("#dialog1").dialog('close');
    $.post("../controlers/control_tranzactions.php",
        {want_id_cash: "1"},

        function(data){
            data = JSON.parse(data);
            for(i=0,j=3,k=6,vl=1;i<data.length;i+=7,j+=7,k+=7,vl+=7){ // получить имя кошльков
                $("#up_cash_minus_sel").append("<option value='"+data[k]+"'>"+data[i]+" ("+data[j]+" "+data[vl]+")</option>").selectmenu('refresh');
                $("#up_cash_sum_sel").append("<option value='"+data[k]+"'>"+data[i]+" ("+data[j]+" "+data[vl]+")</option>").selectmenu('refresh');
                $("#up_cash_trans_sum").append("<option value='"+data[k]+"'>"+data[i]+" ("+data[j]+" "+data[vl]+")</option>").selectmenu('refresh');
                $("#up_cash_trans_min").append("<option value='"+data[k]+"'>"+data[i]+" ("+data[j]+" "+data[vl]+")</option>").selectmenu('refresh');
            }
        });

    $("option").remove();
    if($(".col").css("backgroundColor") != "rgba(0, 0, 0, 0)"){
        $("#dialog2").dialog('open');
        if(index !=""){
            $("#tabs2").tabs("disable",2);
            $("#tabs2").tabs("enable",0);
            $("#tabs2").tabs("enable",1);
            if(what_tr == "min") $( "#tabs2" ).tabs( "option", "active", 0);
            if(what_tr == "plus") $( "#tabs2" ).tabs( "option", "active", 1 );
        }

        if(tmp_id !=""){
            $("#tabs2").tabs("disable",0);
            $("#tabs2").tabs("disable",1);
            $("#tabs2").tabs("enable",2);
            $( "#tabs2" ).tabs( "option", "active", 2 );
        }
        $.post(
            "../controlers/control_tranzactions.php",
            {
                wanna_info_tranz : "1",
                id_tr : index,
                id_trans : tmp_id
            },
            function(data){
                data = JSON.parse(data);
                if(index !=""){
                    if(what_tr == "min"){
                        $("input[name='up_name_tr_minus']").val(data[1]);
                        $("#add_data4").val(data[6]);
                        $("#up_cash_minus_sel").val(data[2]).selectmenu('refresh');
                        $("input[name='up_balance_minus']").val(data[3]);
                        $("#up_comment").val(data[4]);
                        $("input[name='up_name_tr_sum']").val(data[1]);
                        $("#add_data5").val(data[6]);
                        $("#up_cash_sum_sel").val(data[2]).selectmenu('refresh');
                        $("input[name='up_balance_sum']").val(data[3]);
                        $("#up_comment_sum").val(data[4]);
                    }
                    if(what_tr == "plus"){
                        $("input[name='up_name_tr_sum']").val(data[1]);
                        $("#add_data5").val(data[6]);
                        $("#up_cash_sum_sel").val(data[2]).selectmenu('refresh');
                        $("input[name='up_balance_sum']").val(data[3]);
                        $("#up_comment_sum").val(data[4]);
                        $("input[name='up_name_tr_minus']").val(data[1]);
                        $("#add_data4").val(data[6]);
                        $("#up_cash_minus_sel").val(data[2]).selectmenu('refresh');
                        $("input[name='up_balance_minus']").val(data[3]);
                        $("#up_comment").val(data[4]);
                    }

                }

                if(tmp_id !=""){
                    $("input[name='up_name_trans_cash']").val(data[1]);
                    $("#add_data6").val(data[2]);
                    $("#up_cash_trans_min").val(data[3]).selectmenu('refresh');
                    $("input[name='up_trans_balance_min']").val(data[4]);
                    $("#up_cash_trans_sum").val(data[5]).selectmenu('refresh');
                    $("input[name='up_course']").val(data[9]);
                    $("input[name='up_trans_balance_sum']").val(data[6]);
                    $("input[name='up_comment_trans']").val(data[7]);


                }
                up_ind = index;
                //tmp_id ="";
            }
        );
    }
    else alert("Выберите транзакцию!");

});


$("#up_tr_form_minus").submit(function(){

    $.post("../controlers/control_tranzactions.php",
        {
            up_name : $("input[name='up_name_tr_minus']").val(),
            up_data : $("#add_data4").val(),
            up_cash_min : $("#up_cash_minus_sel").val(),
            up_balance_min :  $("input[name='up_balance_minus']").val(),
            up_comment :  $("#up_comment").val(),
            up_index : index
        },
        function(data){
            alert("Транзакция обновлена!");
        }
    );
});

$("#up_tr_form_sum").submit(function(){

    $.post("../controlers/control_tranzactions.php",
        {
            up_name_sum : $("input[name='up_name_tr_sum']").val(),
            up_data_sum : $("#add_data5").val(),
            up_cash_sum : $("#up_cash_sum_sel").val(),
            up_balance_sum :  $("input[name='up_balance_sum']").val(),
            up_comment_sum :  $("#up_comment_sum").val(),
            up_index_sum : index
        },
        function(data){
            alert("Транзакция обновлена!");
        }
    );
});

$("#up_trans_from").submit(function(){

    $.post("../controlers/control_tranzactions.php",
        {
            up_trans_name : $("input[name='up_name_trans_cash']").val(),
            up_trans_data : $("#add_data6").val(),
            up_trans_cash_min : $("#up_cash_trans_min").val(),
            up_trans_balance_min :  $("input[name='up_trans_balance_min']").val(),
            up_trans_cash_sum : $("#up_cash_trans_sum").val(),
            up_course : $("input[name='up_course']").val(),
            up_trans_balance_sum : $("input[name='up_trans_balance_sum']").val(),
            up_trans_comment :  $("#up_comment_trans").val(),
            up_trans_index : tmp_id
        },
        function(data){
            alert("Транзакция обновлена!");
        }
    );
});


