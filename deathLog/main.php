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
		$select = mysqli_query($this->sql, "SELECT name, died_at, death_log FROM player_history ORDER BY `died_at` DESC LIMIT 100;");
		echo('<table width="700px" id="stats" class="tablesorter" border="0" cellspacing="0" align="center">');
		echo('<thead><tr>');
		echo('	<th>Name</th>');
		echo('	<th>Died at</th>');
		echo('	<th>Death Log</th>');;
		echo('</tr></thead><tbody>');
		while($r = mysqli_fetch_array($select, MYSQLI_ASSOC))
		{ 
			echo('<tr class="row">');
			echo('	<td>'.$r['name'].'</td>');
			echo('	<td>'.$r['died_at'].'</td>');
			echo('	<td>'.$r['death_log'].'</td>');
			echo('</tr>');
		}
		echo('</tbody></table>');
	}
}