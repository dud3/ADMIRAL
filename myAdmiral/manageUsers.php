<?php
define('INCLUDE_CHECK',true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Find People / Admiral</title>
<meta name="description" content="Creating sample grids using bootstrap">
<script type="text/javascript" src="../js/jquery.js"></script>
<script src="../js/jquery.dataTables.js"></script>
<?php require_once("../inc/styles.inc.php"); ?>

<script type="text/javascript" src="../js/jquery.pnotify.js"></script>
 <!--[if IE 7]>
  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css">
  <script type="text/javascript" src="js/jquery.pnotify.js"></script>
  <link type="text/css" rel="stylesheet" href="jquery.pnotify.default.css" />

  <![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style type="text/css">
       #container {padding-top: 60px;}
   </style>
   <script type="text/javascript">
    $(document).ready(function() {
            $('#example').dataTable( {
              "bProcessing": true,
              "bServerSide": true,
              "bDestroy": true,
              "bRetrieve": true, 
              "bPaginate": true,
              "sAjaxSource": "../inc/ajaxCall.php"
            } );
          } );
   </script>
</head>

<body>
	<?php require_once("../inc/navbar.inc.php"); ?>
	<div id="container">
    <div class="container-fluid">
      <div class="row-fluid">
      	<?php require_once("../inc/leftpane.inc.php"); ?>
      	<div class="span10">
    <div id="dynamic">
<table cellpadding="0" cellspacing="0" border="0" class="display table table-striped" id="example">
  <thead>
    <tr>
      <th width="20%">User Name</th>
      <th width="25%">First Name</th>
      <th width="25%">Last Name</th>
      <th width="15%">Email</th>
      <th width="15%">Group</th>
      <th width="15%">Member Since</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="5" class="dataTables_empty">Loading data from server</td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <th>User Name</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Member Since</th>
    </tr>
  </tfoot>
</table>
      </div>
      <div class="spacer"></div>
    </div>
		    </div>
  	  </div>
  </div>
  <hr>
    <footer>
      <p>&copy; CopyLeft - Use, Develop, Enjoye, GNU Public License</p>
    </footer>
<?php require_once("../inc/scripts.inc.php"); ?>
</body>
</html>
