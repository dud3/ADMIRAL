<?php

define('INCLUDE_CHECK',true);

require_once("../classes/util.php");
require_once("../classes/Login.php");

  $login = new Login();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	
	<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="../../../admiral/js/bootstrap.js"></script>
	<script type="text/javascript" src="../../../admiral/js/bootstrap-tab.js"></script>
	<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
	<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
	<link rel="stylesheet" type="text/css" href="../../../admiral/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../../../admiral/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../../../admiral/css/bootstrap-responsive.css" />
	
	<script type="text/javascript">
		$().ready(function() {
			$("#course").autocomplete("../inc/autoCompleteMain.php", {
				width: 260,
				matchContains: true,
				//mustMatch: true,
				//minChars: 0,
				//multiple: true,
				//highlight: false,
				//multipleSeparator: ",",
				selectFirst: false
			});
		});
	</script>
	<script type="text/javascript">

	 $(function () {
	 	$('#myTab a:first').tab('show');
		$('#myTab a').click(function (e) {
  		e.preventDefault();
  		$(this).tab('show');
		});
	 })

	</script>
</head>
	
<body>
     <div class="container-fluid">
     		<h2 class="pull-right">Client Manager</h2>
	 <p class="text-info">Notice 0 means "NO" and 1 means "YES"</p>
		  
<?php

	if(isset($_SESSION['id']) && $_SESSION['admin'] == 1) {
	
		include('connect-db.php');
		
		$result = mysql_query("SELECT * FROM tz_members") or die(mysql_error());
		
		echo "<ul class='nav nav-tabs' id='myTab'>";
		echo "<li><a href='#home' data-toggle='tab'>Manage Users</a></li>";
		echo "<li><a href='#edited' data-toggle='tab'>Modifired</a></li>";
		echo "<li><a href='#deleted' data-toggle='tab'>Deleted</a></li>";
		echo "</ul>";

		echo "<div class='tab-content'>";
		echo  "<div class='tab-pane active' id='home'>";
		echo '<form id="form1" autocomplete="off" name="form1" method="post" action="view2.php">';
		echo '<input type="text" name="string" id="course" value="'.stripcslashes($_REQUEST["string"]).'" placeholder="Search user here..." />';
		echo '<label></label><button type="submit" name="button" class="btn btn-primary" id="button">Fileter</button> <a href="view.php" class="btn btn-primary">Reset</a>';
		echo '</form>';	
		
		echo "<b>View all</b> | <a href='view-paginated.php?page=1'>View Pagetined</a>";
		echo '<p><br /><a class="btn btn-inverse" href="new.php">+ Add a new record +</a></p><br />';
		
		
		if ($_REQUEST["string"]<>'') {
		$search_string = " AND (usr LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%' OR email LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%')";	
		$sql = "SELECT * FROM tz_members WHERE id>0".$search_string;
		$result = mysql_query($sql) or die('dead');
		}
		if (mysql_num_rows($result)>0) {
		
		echo "<table class='table table-striped'>";
		echo "<tr><th>ID</th><th>User Name</th><th>E-mail</th><th>md5(Pass)</th><th>Registration date</th><th>Password</th><th>Registered from</th><th>Group</th><th>Modified</th><th><th></th><th></th></tr>";

		while($row = mysql_fetch_array($result)){
			
			if($row['admin'] == '1'){
			echo "<tr class='error' disabled>";
			}else echo '<tr>';
			echo '<td>'.$row['id'].'</td>';
			echo '<td>'.$row['usr'].'</td>';
			echo '<td>'.$row['email'].'</td>';
			echo '<td>'.$row['pass'].'</td>';
			echo '<td>'.$row['dt'].'</td>';
			echo '<td>'.$row['password'].'</td>';
			echo '<td>'.$row['regIP'].'</td>';
			echo '<td>'.$row['admin'].'</td>';
			echo '<td>'.$row['modified'].'</td>';
			echo '<td><a class="btn btn-primary" href="edit.php?id='.$row['id'].'&usr='.$row['usr'].'">Edit</a></td>';
			echo '<td><a class="btn btn-danger" href="delete.php?id='.$row['id'].'&usr='.$row['usr'].'">Delete</a></td>';
			echo "<tr>";
		}
	}else { echo '<font color="red">nothing found</font> Plese press <font color="red">"Reset"</font> or leave the box emplty and press <font color="red">enter</font>'; }
		echo '</table>';
		echo '<p><br /><a href="new.php" class="btn btn-inverse">+ Add new Record +</a></p>';
	
?>	
</div>
	<div class="tab-pane" id="edited">
	 <h2>Modified users</h2>
	 <hr>
<?php 

$modified = mysql_query("SELECT * FROM tz_modified") or die(mysql_error());

	echo "<table class='table table-bordered'>";
	echo "<tr><th>Modified ID</th><th>User id</th><th>Modified by</th><th>Modified user</th><th>After Modification</th><th>Date</th><th>Registry IP</th>";

		if(mysql_num_rows($modified)>0){
			while($row = mysql_fetch_array($modified)){
				
				echo '<tr>';
				echo '<td>'.$row['modified_id'].'</td>';
				echo '<td>'.$row['user_id'].'</td>';
				echo '<td>'.$row['modified_by'].'</td>';
				echo '<td class="text-info">'.$row['modified_user'].'</td>';
				echo '<td class="text-success">'.$row['modified_afer_user'].'</td>';
				echo '<td>'.$row['modified_date'].'</td>';
				echo '<td>'.$row['modified_regIP'].'</td>';
				echo '</tr>';
			}
		}
		echo '</table>';
		
?>
	</div>
	 <div class="tab-pane" id="deleted">
	<h2>Deleted users</h2>
	<hr>
<?php
$deleted = mysql_query("SELECT * FROM tz_deleted") or die(mysql_error());

	echo "<table class='table table-bordered'>";
	echo "<tr><th>Deleted ID</th><th>User id</th><th>Deleted by</th><th>Deleted user</th><th>Date</th><th>Registry IP</th>";


		if(mysql_num_rows($deleted)>0){
			while($row = mysql_fetch_array($deleted)){
				
				echo '<tr class="error">';
				echo '<td>'.$row['deleted_id'].'</td>';
				echo '<td>'.$row['user_id'].'</td>';
				echo '<td>'.$row['deleted_by'].'</td>';
				echo '<td>'.$row['deleted_user'].'</td>';
				echo '<td>'.$row['deleted_date'].'</td>';
				echo '<td>'.$row['deleted_regIP'].'</td>';
				echo '</tr>';
			}
		}
		echo '</table>';
} else echo " dont try to hard :D ! ";
?>
</div>
</div>
</body>

</html>
