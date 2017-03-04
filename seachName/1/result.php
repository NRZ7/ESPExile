<link href="../../css/table.css" media="all" rel="stylesheet" type="text/css">
<link href="../../css/index.css" media="all" rel="stylesheet" type="text/css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../tablesorter.min.js"></script>
<script>
$(document).ready(function() { 
    $("#stats").tablesorter(); 
 }); 
</script>
<?php
class Core {
	private $sql;
	private $perms;
	public function __construct()
	{
		include "../../config/details.php";
		$this->sql = mysqli_connect($host, $user, $pass, $db);
	}
    public function all()
	{
		$img = '<h3>Basics<align="center"/></h3>';
        echo $img;
        $account_name = $_POST['account_name'];
		$select = mysqli_query($this->sql, 'SELECT `name`,`locker`, `score`, `kills`, `deaths`, `total_connections`, datediff(CURDATE(), `last_connect_at`), datediff(CURDATE(), `first_connect_at`), `uid` FROM `account` WHERE `name` = "'.$account_name.'"');
		echo('<table width="1300px" id="stats" class="tablesorter" border="0" cellspacing="0" align="center">');
		echo('<thead><tr>');
		echo('	<th>Name</th>');
	    echo('	<th>Money</th>');
		echo('	<th>Score</th>');
		echo('	<th>Kills</th>');
		echo('	<th>Deaths</th>');
		echo('	<th>Connections</th>');
		echo('	<th>Last connected</th>');
		echo('	<th>First connected</th>');
		echo('</tr></thead><tbody>');
		while($r = mysqli_fetch_array($select, MYSQLI_ASSOC))
		{ 
			echo('<tr class="row">');
			echo('	<td>'.$r['name'].'</td>');
			echo('	<td>'.$r['locker'].'</td>');
			echo('	<td>'.$r['score'].'</td>');
			echo('	<td>'.$r['kills'].'</td>');
			echo('	<td>'.$r['deaths'].'</td>');
			echo('	<td>'.$r['total_connections'].'</td>');
			echo('	<td>'.$r['datediff(CURDATE(), `last_connect_at`)'].' days ago</td>');
			echo('	<td>'.$r['datediff(CURDATE(), `first_connect_at`)'].' days ago</td>');
			echo('</tr>');
		}
		echo('</tbody></table>');		
	}
	public function player()
	{
		$img = '<h3>Last Kills<align="center"/></h3>';
        echo $img;
        $account_name = $_POST['account_name'];
		$select = mysqli_query($this->sql, 'SELECT name, died_at, death_log, killer_name FROM player.history WHERE killer_name = "'.$account_name.'"');
		echo('<table width="1300px" id="stats" class="tablesorter" border="0" cellspacing="0" align="center">');
		echo('<thead><tr>');
	    echo('	<th>Killed At</th>');
		echo('	<th>Killer</th>');
		echo('	<th>Victim</th>');
		echo('	<th>Death Log</th>');
		echo('</tr></thead><tbody>');
		while($r = mysqli_fetch_array($select, MYSQLI_ASSOC))
		{ 
			echo('<tr class="row">');
			echo('	<td>'.$r['died_at'].'</td>');
			echo('	<td>'.$r['killer_name'].'</td>');
			echo('	<td>'.$r['name'].'</td>');
			echo('	<td>'.$r['death_log'].'</td>');
			echo('</tr>');
		}
		echo('</tbody></table>');
	}
	public function gear()
	{
		$img = '<h3>Gear<align="center"/></h3>';
        echo $img;
        $account_name = $_POST['account_name'];
		$select = mysqli_query($this->sql, 'SELECT *  FROM player WHERE name = "'.$account_name.'"');
		echo('<table width="1300px" id="stats" class="tablesorter" border="0" cellspacing="0" align="center">');
		echo('<thead><tr>');
	    echo('	<th>Headgear</th>');
		echo('	<th>Goggles</th>');
		echo('	<th>Uniform</th>');
		echo('	<th>Vest</th>');
		echo('	<th>Backpack</th>');
		echo('	<th>Weapon</th>');
		echo('	<th>Handgun</th>');
		echo('</tr></thead><tbody>');
		while($r = mysqli_fetch_array($select, MYSQLI_ASSOC))
		{ 
			echo('<tr class="row">');
			echo('	<td>'.$r['headgear'].'</td>');
			echo('	<td>'.$r['goggles'].'</td>');
			echo('	<td>'.$r['uniform'].'</td>');
			echo('	<td>'.$r['vest'].'</td>');
			echo('	<td>'.$r['backpack'].'</td>');
			echo('	<td>'.$r['primary_weapon'].'</td>');
			echo('	<td>'.$r['handgun_weapon'].'</td>');
			echo('</tr>');
		}
		echo('</tbody></table>');
	}
	public function vehicles()
	{
		$img = '<h3>Vehicles<align="center"/></h3>';
        echo $img;
        $account_name = $_POST['account_name'];
		$select = mysqli_query($this->sql, 'SELECT `name`,`class`, Round((fuel),2), Round((damage),2), datediff(CURDATE(), `spawned_at`) FROM `account`,`vehicle` WHERE uid= account_uid and `name` = "'.$account_name.'"');
		echo('<table width="1300px" id="stats" class="tablesorter" border="0" cellspacing="0" align="center">');
		echo('<thead><tr>');
	    echo('	<th>Class</th>');
		echo('	<th>Fuel</th>');
		echo('	<th>Damage</th>');
		echo('	<th>Days old</th>');
		echo('</tr></thead><tbody>');
		while($r = mysqli_fetch_array($select, MYSQLI_ASSOC))
		{ 
			echo('<tr class="row">');
			echo('	<td>'.$r['class'].'</td>');
			echo('	<td>'.$r['Round((fuel),2)'].'</td>');
			echo('	<td>'.$r['Round((damage),2)'].'</td>');
			echo('	<td>'.$r['datediff(CURDATE(), `spawned_at`)'].' days old</td>');
			echo('</tr>');
		}
		echo('</tbody></table>');
	}
	public function territory()
	{
		$img = '<h3>Territory Owner?<align="center"/></h3>';
        echo $img;
        $account_name = $_POST['account_name'];
		$select = mysqli_query($this->sql, 'SELECT territory.*,account.name as nombre  FROM account INNER JOIN territory on uid=owner_uid WHERE account.name = "'.$account_name.'"');
		#select = mysqli_query($this->sql, 'SELECT territory.*,account.name as nombre  FROM account INNER JOIN territory on uid IN (build_rights) WHERE account.name = "'.$account_name.'"');
		echo('<table width="1300px" id="stats" class="tablesorter" border="0" cellspacing="0" align="center">');
		echo('<thead><tr>');
	    echo('	<th>Name</th>');
		echo('	<th>Radius</th>');
		echo('	<th>Level</th>');
		echo('</tr></thead><tbody>');
		while($r = mysqli_fetch_array($select, MYSQLI_ASSOC))
		{ 
			echo('<tr class="row">');
			echo('	<td>'.$r['name'].'</td>');
			echo('	<td>'.$r['radius'].'</td>');
			echo('	<td>'.$r['level'].'</td>');
			echo('</tr>');
		}
		echo('</tbody></table>');
	}
}