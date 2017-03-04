<?php
class Core {
	private $sql;
	private $perms;
	public function __construct()
	{
		include('../config/details.php');
		$this->sql = mysqli_connect($host, $user, $pass, $db);
	}
    public function player_stats()
	{
		$select = mysqli_query($this->sql, "SELECT name, radius, level, created_at, flag_stolen_at, last_paid_at, datediff(CURDATE(), `last_paid_at`) FROM territory ORDER BY `created_at` DESC LIMIT 100;");
		echo('<table width="900px" id="stats" class="tablesorter" border="0" cellspacing="0" align="center">');
		echo('<thead><tr>');
		echo('	<th>Name</th>');
		echo('	<th>Radius</th>');		
		echo('	<th>Level</th>');
		echo('	<th>Created at</th>');
		echo('	<th>Stealed at</th>');
		echo('	<th>Protection</th>');
		echo('	<th>Last Paid</th>');
		echo('</tr></thead><tbody>');
		while($r = mysqli_fetch_array($select, MYSQLI_ASSOC))
		{ 
			echo('<tr class="row">');
			echo('	<td>'.$r['name'].'</td>');
			echo('	<td>'.$r['radius'].'</td>');
			echo('	<td>'.$r['level'].'</td>');
			echo('	<td>'.$r['created_at'].'</td>');
			echo('	<td>'.$r['flag_stolen_at'].'</td>');
			echo('	<td>'.$r['last_paid_at'].'</td>');
			echo('	<td>'.$r['datediff(CURDATE(), `last_paid_at`)'].' days ago</td>');
			echo('</tr>');
		}
		echo('</tbody></table>');
	}
}