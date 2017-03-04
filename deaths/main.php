<?php
class Core {
	private $sql;
	private $perms;
	public function __construct()
	{
		include "../config/details.php";
		include "count.php";
		$this->sql = mysqli_connect($host, $user, $pass, $db);
	}
    public function all()
	{
		$select = mysqli_query($this->sql, "SELECT `name`, `distance`, `killer_name`, `died_at` FROM `player_history` WHERE `distance` > 1 ORDER BY `died_at` DESC LIMIT 100");
		echo('<table width="1300px" id="stats" class="tablesorter" border="0" cellspacing="0" align="center">');
		echo('<thead><tr>');
	    echo('	<th>Victim</th>');
		echo('	<th>Distance</th>');
		echo('	<th>Killer</th>');
		echo('	<th>date/time</th>');
		echo('</tr></thead><tbody>');
		while($r = mysqli_fetch_array($select, MYSQLI_ASSOC))
		{ 
			echo('<tr class="row">');
			echo('	<td>'.$r['name'].'</td>');
			echo('	<td>'.$r['distance'].'</td>');
			echo('	<td>'.$r['killer_name'].'</td>');
			echo('	<td>'.$r['died_at'].'</td>');
			echo('</tr>');
		}
		echo('</tbody></table>');
	}
	public function spenttoday()
	{
	$select = mysqli_query($this->sql, "SELECT COUNT(killer_name) FROM `player_history` WHERE `died_at` > CURDATE();");	
		echo('<table width="1300px" id="stats" class="tablesorter" border="0" cellspacing="0" align="center">');
		echo('<thead><tr>');
		echo('	<th>Kills today</th>');
		echo('</tr></thead><tbody>');
		while($r = mysqli_fetch_array($select, MYSQLI_ASSOC))
		{ 
			echo('<tr class="row">');
			echo('	<td>'.$r['COUNT(killer_name)'].'</td>');
			echo('</tr>');
		}
		echo('</tbody></table>');
	}
	public function tally()
	{
		$select = mysqli_query($this->sql, "SELECT Round(AVG(distance),1), COUNT(killer_name) FROM `player_history`;");
		echo('<table width="1300px" id="stats" class="tablesorter" border="0" cellspacing="0" align="center">');
		echo('<thead><tr>');
		echo('	<th>Average Distance</th>');
		echo('	<th>Total Kills</th>');
		echo('</tr></thead><tbody>');
		while($r = mysqli_fetch_array($select, MYSQLI_ASSOC))
		{ 
			echo('<tr class="row">');
			echo('	<td>'.$r['Round(AVG(distance),1)'].'</td>');
			echo('	<td>'.$r['COUNT(killer_name)'].'</td>');
			echo('</tr>');
		}
		echo('</tbody></table>');
	}
    public function big()
	{
		$select = mysqli_query($this->sql, "SELECT `killer_name`, `distance`, `name`, datediff(CURDATE(), `died_at`) FROM `player_history` ORDER BY `distance` DESC LIMIT 3");
		echo('<table width="1300px" id="stats" class="tablesorter" border="0" cellspacing="0" align="center">');
		echo('<thead><tr>');
	    echo('	<th>Champ</th>');
		echo('	<th>Distance</th>');
		echo('	<th>De_stroyed</th>');
		echo('	<th>When</th>');
		echo('</tr></thead><tbody>');
		while($r = mysqli_fetch_array($select, MYSQLI_ASSOC))
		{ 
			echo('<tr class="row">');
			echo('	<td>'.$r['killer_name'].'</td>');
			echo('	<td>'.$r['distance'].'</td>');
			echo('	<td>'.$r['name'].'</td>');
			echo('	<td>'.$r['datediff(CURDATE(), `died_at`)'].' Days ago</td>');
			echo('</tr>');
		}
		echo('</tbody></table>');
	}
}