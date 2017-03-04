<?php
include('count.php');
?>
<html>
<head>
<link rel="shortcut icon" href="http://icons.iconarchive.com/icons/iconsmind/outline/128/Alien-2-icon.png">
<title>Exile Stats 6</title>
<link href="style.css" rel="stylesheet"/>
</head>
<div class="container">
  <h3 class="title">Exile Stats 6</h3>
  <ul>
    <li class="dropdown">
      <input type="checkbox" />
      <a href="#" data-toggle="dropdown">Server</a>
      <ul class="dropdown-menu">
        <!--<li><a href="main/index.php">Ránking</a></li>-->
		<li><a href="sum/index.php">General</a></li>	
		<!-- DEATHS AND DEATHLOG NEEDS A CUSTOM MODIFICATION OVER EXILE FILES NOT SHARED FOR NOW</a></li>-->
		<!--<li><a href="deathLog/index.php">Log de Muertes</a></li>
		<li><a href="deaths/index.php">Estadísticas de Muertes</a></li>-->
		<li><a href="territories/index.php">Territories</a></li>
      </ul>
    </li>
	<li class="dropdown">
      <input type="checkbox" />
      <a href="#" data-toggle="dropdown">Ranking</a>
      <ul class="dropdown-menu">
        <li><a href="main/index.php">Respect</a></li>
		<li><a href="ladderKills/index.php">Kills</a></li>
		<!--<li><a href="ladderRatio/index.php">Ratio de muertes</a></li>-->
        <!--<li><a href="ladderMoney/index.php">Dinero</a></li>-->	
      </ul>
    </li>
    <li class="dropdown">
      <input type="checkbox" />
      <a href="#" data-toggle="dropdown">Search Players</a>
      <ul class="dropdown-menu">
	  	<li><a href="nameall/index.php">By Name</a></li>
		<li><a href="uidall/index.php">By UID</a></li>
      </ul>
    </li>
	<li class="dropdown">
      <input type="checkbox" />
      <a href="#" data-toggle="dropdown">Diagrams</a>
      <ul class="dropdown-menu">
	  	<li><a href="pie8/index.php">[PIE] Vehicles</a></li>
		<li><a href="pie7/index.php">[PIE] Weapon</a></li>
		<li><a href="pie9/index.php">[PIE] Handgun</a></li>			
	  	<li><a href="pie6/index.php">[PIE] Uniforms</a></li>	
	    <li><a href="pie10/index.php">[PIE] Vests</a></li>
		<li><a href="pie5/index.php">[PIE] Backpacks</a></li>	  			
      </ul>
    </li>
<!--   <li class="dropdown">
      <input type="checkbox" />
      <a href="#" data-toggle="dropdown">Admin</a>
      <ul class="dropdown-menu">
        <li><a href="alogin/index.php">Login coming soon</a></li>
      </ul>
    </li>
  </ul>
 --> 
</div>
<!-- <img src="css/coft.png" alt="Smiley face" height="30" width="90"> WHO NEEDS THIS SHIT?! -->
</html>