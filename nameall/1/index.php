<?php
include('result.php');
$core = new Core();
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../tablesorter.min.js"></script>
<script>
$(document).ready(function() { 
    $("#stats").tablesorter(); 
 }); 
</script>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            ESP exile stats page 6
        </title>
    </head>
<body>
<?php
$core->all();
$core->lastkill();
$core->longkill();
$core->gear();
$core->vehicles();
$core->territory();
?>
<input type="button" value="Volver Atrás" onclick="history.back(-1)" />
 </body>
</html>