<?php
if(isset($_SESSION['login'])){

    if($_SESSION['login'] == '1'){
        echo('  <script>
                    $(document).ready ( function(){
                        $("#on3_fro").css({"display" : "block"});
                    });
                </script>
        ');
        $_SESSION['login'] = '';
    }
    if($_SESSION['login'] == '0'){
        echo('  <script>
                    $(document).ready ( function(){
                        $("#on3_fro").css({"display" : "none"});
                    });
                </script>
        ');
    }
}

 ?>
