<?php
include('../config/details.php');
include('main.php');
$core = new Core();
?>
<html>
<head>
<link rel="shortcut icon" href="http://icons.iconarchive.com/icons/iconsmind/outline/128/Alien-2-icon.png">
  <title>Deaths Log</title>
	<link href="../css/index.css" rel="stylesheet"/>
    <link href="../css/table.css" media="all" rel="stylesheet" type="text/css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="../tablesorter.min.js"></script>
	<script>
	$(document).ready(function() { 
    $("#stats").tablesorter(); 
    }); 
    </script>
</head>
<body>
<?php
$core->spenttoday();
$core->big();
$core->tally();
$core->all();
?>
</body>
<div style="color:#6F536B" id="footer">
<input type="button" value="Volver Atrás" onclick="history.back(-1)" />
<span>Exile Stats Page</span>
</div>
</html>