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
		$select = mysqli_query($this->sql, "SELECT clan.id, clan.name, clan.leader_uid, clan.created_at  FROM clan ORDER BY `id` DESC LIMIT 100;");
		$select2 = mysqli_query($this->sql, "SELECT uid, clan_id, name  FROM account WHERE uid = `leader_uid`");
		echo('<table width="900px" id="stats" class="tablesorter" border="0" cellspacing="0" align="center">');
		echo('<thead><tr>');
		echo('	<th>ID</th>');
		echo('	<th>Name</th>');		
		echo('	<th>Leader UID</th>');
		//echo('	<th>Leader Name</th>');
		echo('	<th>Created at</th>');
		echo('</tr></thead><tbody>');
		while($r = mysqli_fetch_array($select, MYSQLI_ASSOC))
		{ 
			echo('<tr class="row">');
			echo('	<td>'.$r['clan.id'].'</td>');
			echo('	<td>'.$r['clan.name'].'</td>');
			echo('	<td>'.$r['clan.leader_uid'].'</td>');
			//echo('	<td>'.$r['account.uid'].'</td>');
			echo('	<td>'.$r['clan.created_at'].'</td>');
			echo('</tr>');
		}
		echo('</tbody></table>');
	}
}