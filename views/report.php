<?php
if(!isset($_COOKIE['SingIN'])){
    header('Location:../index.php');
}
require "../controlers/control_main_page.php";

require "../controlers/control_report.php";

require "partpage.php";
$part = new partPage();
echo("<title>Ledger - Отчеты</title>");
$part->head();
echo('<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">');
$part->arr_links("mainpage.css", "report_style.css" );
$part->script_links("https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js", "../js/accordion.js", "../js/tabs.js", "../libs/cellSelection.min.js","https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js");
?>
<div>
    <select id="chose">
        <option value="0"></option>
        <option value="1">Расходы</option>
        <option value="2">Доходы</option>
    </select>
</div>
    <br>
    <br>
<div style="width:65%;height:500px; color:white; background-color:white">
    <canvas id="myChart" ></canvas>

</div>

<div id="content">

</div>

    <script>

        $("#chose").change(function(){

            var myLineChart = Chart.Line(canvas,{
                data:data,
                options:option
            });

            var option = {
                showLines: true
            };

           if( $("#chose").val() == 1){
               //myLineChart.clear();
              /* myLineChart.data.datasets[0].data = [];
               myLineChart.data.labels = [];*/
               myLineChart.data.datasets[0].borderColor = 'blue';
               myLineChart.data.datasets[0].label =  "Расход";

               $.post(
                   "../controlers/control_report.php",
                   {
                       wanna_info_tr_min : "1"
                   },
                   function(data){
                      // alert(data);
                       data = JSON.parse(data);

                       for(i=1,j=2,k=0;i<data.length;i+=3,j+=3,k++){

                           //$("#content").append("name= "+data[k]+" data= "+data[i]+" balance= "+data[j]+ "<br>");
                           myLineChart.data.labels[k] = data[i];
                           myLineChart.data.datasets[0].data[k] = data[j];
                       }
                       myLineChart.update();
                   }
               );
               //myLineChart.update();
            }
             else if($("#chose").val() == 2){
               //myLineChart.clear();

               myLineChart.data.datasets[0].data = [];
               myLineChart.data.labels = [];
               myLineChart.data.datasets[0].borderColor = 'red';
               myLineChart.data.datasets[0].label =  "Доход";

               $.post(
                   "../controlers/control_report.php",
                   {
                       wanna_info_tr_plus : "1"
                   },
                   function(data){
                       data = JSON.parse(data);
                        for(i=1,n=0,j=2,k=0;i<data.length;i+=3,j+=3,k++,n+=3){
                            myLineChart.data.labels[k] = data[i];
                            $("#content").append(data[n]+"<br>");
                            myLineChart.data.datasets[0].data[k] = data[j];
                        }
                       myLineChart.update();
                   }

               );
               //myLineChart.update();
           }

        });




    </script>

    <script>
        var canvas = $('#myChart');
        var data = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Расход",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(75,192,192,0.4)",
                    borderColor: "rgba(75,192,192,1)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(75,192,192,1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(75,192,192,1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 5,
                    pointHitRadius: 10,
                    //data: [65, 59, 80, 0, 56, 55, 40],
                }
            ]
        };


    </script>





<?php
$part->script_links("../js/report.js");
$part->foot();
?>