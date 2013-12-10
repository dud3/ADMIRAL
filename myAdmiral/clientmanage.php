<?php

define('INCLUDE_CHECK',true);

require_once("../conf/db.php");
require_once("../classes/util.php");
// require_once("../inc/enc.php");
require_once("../classes/Login.php");
require_once("../classes/clientManagerRegistration.php");
require_once("../classes/clientManagerFunctions.php");

  $login = new Login();
  $registration = new ClientManagerRegistration();
  $clientManager = new ClientManagerFunctions();

  // after every action regenerade session ID
  session_regenerate_id(true);            

  $redirect = urlencode(util::get_current_url());
  $hostIp = $_SERVER['REMOTE_ADDR'];
  $sshClient = "https://".$_SERVER['SERVER_ADDR'].":8080";
  $currentUser = $_SESSION['user_name'];

  $login->getUserLevel();

    if ($login->isUserLoggedIn() != true) {      

          header("Location: ../?redirect=$redirect&IPregistered=$hostIp&old_usr=$currentUser");

    } 

  $messagetags = "<div class='notifications center'></div>";
  $url_error = '?message=error';
  $url_success = '?message=success';
  $admin = $login->getUserLevel();

  $connect = mysql_connect(DB_HOST , DB_USER, DB_PASS) or die('fail');

  mysql_select_db(DB_NAME) or die('fail 2');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Client Manager / Admiral</title>
<meta name="description" content="Creating sample grids using bootstrap">
<script type="text/javascript" src="../js/jquery.js"></script>
<script type='text/javascript' src="../js/jquery.autocomplete.js"></script>
<script src="../js/bootstrap-notify.js"></script>
<script type="text/javascript" src="../js/validate.js"></script>
<script type="text/javascript" src="../js/scrolltopcontrol.js">

/***********************************************
* Scroll To Top Control script- � Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Project Page at http://www.dynamicdrive.com for full source code
***********************************************/

</script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<link href="../css/bootstrap-notify.css" rel="stylesheet" />
<link href="../css/styles/alert-notification-animations.css" rel="stylesheet" />

<?php require_once("../inc/styles.inc.php"); ?>
<?php 

  if($login->getUserLevel() == '5') {

?>

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
    $('#myTab a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    })
   })

  </script>

  <script type="text/javascript">

    $(document).ready(function(){
       $('#type').tooltip({
       trigger: "hover",
          animation: true,
          html: true,
          placement: 'top'
        });
      });

  </script>
</head>

<body>

<?php require_once("../inc/navbar.inc.php"); ?>
<?php

  // Show positive registration messages
    if ($registration->messages) {
        foreach ($registration->messages as $registrationMessages) {
          echo $messagetags;
    }
  }

    if($clientManager->messages) {
      foreach ($clientManager->messages as $managerMessages) {
        echo $messagetags;
    }
  
  }

    if($clientManager->errors) {
      foreach ($clientManager->errors as $error) {
        echo $messagetags;
    }

  }

    if ($registration->errors) {
      foreach ($registration->errors as $error) {
        echo $messagetags;
    }

  }

?>

	<div id="container">
    <div class="container-fluid">
      <div class="row-fluid">      	
          <div class="span12">
            <div class="row-fluid">
            <!-- Client manager's header -->

            <h2 class="pull-right">Client Manager</h2>
            <!-- Tabing section -->
            <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#home" data-toggle="tab">Manage Users</a></li>
            <li><a href="#deleted" data-toggle="tab">Delted users</a></li>
            <li><a href="#logs" data-toggle="tab">Logs</a></li>
            </ul>

            <div class="tab-content">
            <div class="tab-pane fade in active" id="home">
            <form id="form1" autocomplete="off" name="form1" method="post" action="">
              <input type="text" name="string" id="course" value="<?php stripcslashes($_REQUEST['string']); ?>" placeholder="Search by username..." />
              <label></label><button type="submit" name="button" class="btn btn-primary" id="button"><b class="icon-search"></b> Filter</button> <a href="clientmanage.php" class="btn btn-primary"><b class="icon-refresh"></b> Refresh</a>
              <a href="#myModal" role="button" data-toggle="modal" class="btn btn-inverse pull-right"><b class="icon-plus"></b> Create New User <b class="icon-plus"></b></a>
            </form>
          <!-- Registration form -->

    <form name="register" method="post" action=""> 
          <!-- Modal -->
      <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 id="myModalLabel">Create User</h3>
            </div>

        <div class="modal-body">
            <form class="form-horizontal">
        <fieldset>

          <!-- Text input-->
          <div class="control-group">
            <div class="controls">
            <input name="user_first_name" id="user_first_name" type="text" placeholder="First Name..." class="input-xlarge" required="">
            </div>
          </div>

          <!-- Text input-->
          <div class="control-group">
            <div class="controls">
              <input name="user_last_name" id="user_last_name" type="text" placeholder="Last name..." class="input-xlarge" required="">
            </div>
          </div>

          <!-- Text input-->
          <div class="control-group">
            <div class="controls">
              <input name="user_name" id="user_name" type="text" placeholder="User Name..." class="input-xlarge" required="">
            </div>
          </div>

          <!-- Text input-->
          <div class="control-group">
            <div class="controls">
              <input name="user_email" id="user_email" type="text" placeholder="Email Adress..." class="input-xlarge" required="">
            </div>
          </div>

          <!-- Password input-->
          <div class="control-group">
            <div class="controls">
              <input name="user_password_new" id="user_password_new" type="password" placeholder="Password..." class="input-xlarge" required="">
            </div>
          </div>

          <!-- Password input-->
          <div class="control-group">
            <div class="controls">
              <input name="user_password_repeat" id="user_password_repeat" type="password" placeholder="Retype Password..." class="input-xlarge" required="">
            </div>
          </div>

          <select name="user_level" id="user_level">
            <option value="0">Select User Priviledged </option>    
            <option value="1"> Basic user(unpriviledged) </option>
            <option value="5"> Admin User </option>
            <option value="2" disabled> Others(not supported yet) </option>
            <option value="3" disabled> Others(not supported yet) </option>
            <option value="4" disabled> Others(not supported yet) </option>
          </select>
        </fieldset>
      </div>

        <div class="modal-footer">
          <!-- Button -->
          <div class="control-group">
            <div class="controls">
              <button id="register" name="register" class="btn btn-primary">Create New</button>
              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </form>

  <hr>
      <table class="table table-hover table-condensed">
      <thead><tr><th>ID</th><th>User Name</th><th>E-mail</th><th>Hashed Passowrd</th><th>Registered on</th><th><small>Type</small> <b class="icon-question-sign icon-2x" id="type" rel="tooltip" data-title="User type, 1 means less priviledged and 5 means the most(admin)"></b></th><th>Delete</th><th>Edit</th><th>Status</th></tr></thead>
  <?php

 if($currentUser == "admiral") {

    $result = mysql_query("SELECT * FROM cw_users WHERE user_level <= 5 AND user_name != 'admiral' ORDER BY user_level DESC") or die(mysql_error());

    if ($_REQUEST["string"]<>'') {

        $search_string = " AND (user_name LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%' OR user_email LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%')"; 
        $sql = "SELECT * FROM cw_users WHERE user_id>0 AND user_level<=5".$search_string;
        $result = mysql_query($sql) or die('dead');

      }

    } else {
	
	 $result = mysql_query("SELECT * FROM cw_users WHERE user_level < 5 ORDER BY user_member_since DESC") or die(mysql_error());

    if ($_REQUEST["string"]<>'') {

        $search_string = " AND (user_name LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%' OR user_email LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%')"; 
        $sql = "SELECT * FROM cw_users WHERE user_id>0 AND user_level<5".$search_string;
        $result = mysql_query($sql) or die('dead');

      }
    }

      if (mysql_num_rows($result)>0) {

        while($row = mysql_fetch_array($result)) {

               echo '<tr>';
               echo '<td>'.$row['user_id'].'</td>';
               echo '<td>'.$row['user_name'].'</td>';
               echo '<td>'.$row['user_email'].'</td>';
               echo '<td>'.util::safe_truncate($row['user_password_hash'], 24).'</td>';
               echo '<td>'.$row['user_member_since'].'</td>';
               echo '<td>'.$row['user_level'].'</td>';
               echo '<td><a class="btn btn-danger" href="?action=delete&user_id='.$row['user_id'].'&user_name='.$row['user_name'].'"><b class="icon-trash"></b></a></td>';
               echo '<td>';
               echo '<div class="btn-group">';
               echo '<button class="btn">other</button>';
               echo '<button class="btn dropdown-toggle" data-toggle="dropdown">';
               echo '<span class="caret"></span>';
               echo '</button>';
               echo '<ul class="dropdown-menu">';

            if($row['user_status'] == 'live') {
	            if($row['user_level'] != '5') {
                    echo '<li><a href="?action=makeAdmin&user_id='.$row['user_id'].'&user_name='.$row['user_name'].'"><b class="icon-legal text-info"></b> Make Admin</a></li>';
	            }
          
                    echo '<li><a href="?action=suspend&user_id='.$row['user_id'].'&user_name='.$row['user_name'].'"><b class="icon-minus-sign text-error"></b> Suspend</a></li>';
                 
		      } elseif($row['user_status'] == 'suspended') {   

                    echo '<li><a href="?action=unsuspend&user_id='.$row['user_id'].'&user_name='.$row['user_name'].'"><b class="icon-ok-sign text-success"></b> UnSuspend</a></li>';

                 }

                  echo'</ul>';

                echo '</div>';

                 if($row['user_status'] == 'live') {

                    echo '<td><span class="label label-success">'.$row['user_status'].'</td></span>';

                } elseif($row['user_status'] == 'suspended') {

                    echo '<td><span class="label label-important">'.$row['user_status'].'</td></span>';

                }

                echo '</td>';

                echo "<tr>";

          }

      } else { echo '<b class="text-error"> Nothing Found! </b><br /> Plese press <i class="text-info">Refresh</i> or leave the box empty and press <i class="text-info">Enter</i>'; }

  ?>  
            </table>
            <hr>
            <a href="#myModal" role="button" data-toggle="modal" class="btn btn-inverse pull-right"><b class="icon-plus"></b> Create New User <b class="icon-plus"></b></a>
            </div>
            <div class="tab-pane fade in" id="deleted">deleted user's here <em class="text-info">Comming soon...</em> </div>
            <div class="tab-pane fade in" id="logs">Logs <em class="text-info">Comming soon...</em></div>
            </div>
          </div>
		    </div>
  	  </div>

        <hr>
        <footer>
        <p>&copy; CopyLeft - Use, Develop, Enjoye, GNU Public License</p>
        </footer>

  </div>
</div>

<?php require_once("../inc/scripts.inc.php"); ?>

  <script>

    <?php if ($registration->errors || $clientManager->errors)  {?>

      $('.center').notify({

        message: { text: '<?php echo $error ?>!'},

        type: 'error',

        closable: true,

        fadeOut: { enabled: true, delay: 8000 }

       }).show(); 

    <?php }?>

    <?php if ($registration->messages) {  ?>   

      $('.center').notify({

        message: {text: '<?php echo $registrationMessages ?>'},

        type: 'success',

        closable: true,

        fadeOut: { enabled: true, delay: 8000 }

      }).show();

    <?php } ?>

    <?php if ($clientManager->messages) {  ?>   

      $('.center').notify({

        message: {text: "<?php echo $managerMessages ?>"},

        type: 'success',

        closable: true,

        fadeOut: { enabled: true, delay: 6000 }

      }).show();

    <?php } ?>

  </script>

</body>
</html>

<?php } elseif ($login->getUserLevel() == '1') {

         header("Location: ../index.php");

  } else {

      echo "<h1 class='text-error'>Busted, Not allowed, go home, we are in the same side ;)</h1>";

      header("Refresh: 5, URL=index.php");

  }

?>



