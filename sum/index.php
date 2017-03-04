<?php
include('../config/details.php');
include('main.php');
$sum = new sum();
?>
<html>
<head>
<link rel="shortcut icon" href="http://icons.iconarchive.com/icons/iconsmind/outline/128/Alien-2-icon.png">
  <title>Stats Summary</title>
<link href="../css/table.css" media="all" rel="stylesheet" type="text/css">
<link href="../css/index.css" media="all" rel="stylesheet" type="text/css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="tablesorter.min.js"></script>
	<script>
	$(document).ready(function() { 
        $("#stats").tablesorter(); 
    }); 
    </script>
</head>
<body>

<?php
$sum->sentence();
$sum->player_avg();
$sum->new_players();
$sum->new_ter();
$sum->sur();
?>
</body>
<div style="color:#aa0000" id="footer">
<input type="button" value="Volver Atrás" onclick="history.back(-1)" />
<span>E.S.P Exile Stats Page 6</span>
</div>
</html>