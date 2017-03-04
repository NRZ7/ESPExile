<?php
class sum {
	private $sql;
	private $perms;
	public function __construct()
	{
		include('../config/details.php');
		$this->sql = mysqli_connect($host, $user, $pass, $db);
	}
	public function sentence()
	{
		$result = mysqli_query($this->sql, "SELECT * FROM `account`");
		$result2 = mysqli_query($this->sql, "SELECT `id` FROM `vehicle`");
		$result3 = mysqli_query($this->sql, "SELECT `id` FROM `construction`");
		$result4 = mysqli_query($this->sql, "SELECT * FROM `container`");
		$result5 = mysqli_query($this->sql, "SELECT `id` FROM `territory`");
		$rows = $result->num_rows;
		$rows2 = $result2->num_rows;
		$rows3 = $result3->num_rows;
		$rows4 = $result4->num_rows;
		$rows5 = $result5->num_rows;
		echo('<article>');
		$ply = '<h3>There are '.$rows.' Players, '.$rows2.' Vehicles, '.$rows3.' construction objects, '.$rows4.' containers and  '.$rows5.' territories.</h3>';
        echo $ply;
		echo('</article>');
	}
	public function player_avg()
	{
		$select = mysqli_query($this->sql, "SELECT Round(Avg(hunger),1), Round(AVG(thirst), 1), Round(AVG(damage),1), Round(AVG(temperature),1) from player;");
		echo('<table width="700px" id="stats" class="tablesorter" border="0" cellspacing="0" align="center">');
		echo('<thead><tr>');
		echo('	<th>AVG Hunger</th>');
	    echo('	<th>AVG Thirst</th>');
		echo('	<th>AVG Damage</th>');
		echo('	<th>AVG Temperature</th>');
		echo('</tr></thead><tbody>');
		while($r = mysqli_fetch_array($select, MYSQLI_ASSOC))
		{ 
			echo('<tr class="row">');
			echo('	<td>'.$r['Round(Avg(hunger),1)'].'</td>');
			echo('	<td>'.$r['Round(AVG(thirst), 1)'].'</td>');
			echo('	<td>'.$r['Round(AVG(damage),1)'].'</td>');
			echo('	<td>'.$r['Round(AVG(temperature),1)'].'</td>');
		}
		echo('</tbody></table>');
	}
	public function title_1()
	{
		echo('<article>');
		$ply = '<h3>Summary<align="center"/></h3>';
        echo $ply;
		echo('</article>');
	}
	public function new_players()
	{
		$select = mysqli_query($this->sql, "SELECT `name` FROM `account` ORDER BY `last_connect_at` DESC LIMIT 5;");
		echo('<table width="700px" id="stats" class="tablesorter" border="0" cellspacing="" align="center">');
		echo('<thead><tr>');
		echo('	<th>Newest players are:</th>');
		echo('</tr></thead><tbody>');
		while($r = mysqli_fetch_array($select, MYSQLI_ASSOC))
		{ 
			echo('<tr class="row">');
			echo('	<td>'.$r['name'].'</td>');
		}
		echo('</tbody></table>');
	}
	public function new_ter()
	{
		$select = mysqli_query($this->sql, "SELECT `name` FROM `territory` ORDER BY `created_at` DESC LIMIT 5;");
		echo('<table width="700px" id="stats" class="tablesorter" border="0" cellspacing="" align="center">');
		echo('<thead><tr>');
		echo('	<th>Newest Territories are:</th>');
		echo('</tr></thead><tbody>');
		while($r = mysqli_fetch_array($select, MYSQLI_ASSOC))
		{ 
			echo('<tr class="row">');
			echo('	<td>'.$r['name'].'</td>');
		}
		echo('</tbody></table>');
		
	}
	public function sur()
	{
		$select = mysqli_query($this->sql, "SELECT `name`, datediff(CURDATE(), `spawned_at`) FROM `player` LIMIT 5;");
		echo('<table width="700px" id="stats" class="tablesorter" border="0" cellspacing="" align="center">');
		echo('<thead><tr>');
		echo('	<th>Name:</th>');
		echo('	<th>Days survived:</th>');
		echo('</tr></thead><tbody>');
		while($r = mysqli_fetch_array($select, MYSQLI_ASSOC))
		{ 
			echo('<tr class="row">');
			echo('	<td>'.$r['name'].'</td>');
			echo('	<td>'.$r['datediff(CURDATE(), `spawned_at`)'].'</td>');
		}
		echo('</tbody></table>');
		
	}
}