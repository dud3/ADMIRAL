<?php

define('INCLUDE_CHECK',true);

require_once("../conf/db.php");
require_once("../classes/editProfile.php");
  
$editProfile = new editProfile();

$messagetags = "<div class='notifications center'></div>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Profile / Admiral</title>
<meta name="description" content="Creating sample grids using bootstrap">

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.pnotify.js"></script>
<script type="text/javascript" src="../js/scrolltopcontrol.js"></script>
<script type="text/javascript" src="../js/validate.js"></script>
<script type="text/javascript" src="../js/bootstrap-notify.js"></script>
<link href="../css/styles/alert-notification-animations.css" rel="stylesheet" />  
<script src="../js/bootstrap-notify.js"></script>
<link href="../css/bootstrap-notify.css" rel="stylesheet" />
<link href="../css/styles/alert-notification-animations.css" rel="stylesheet" />

<?php require_once("../inc/styles.inc.php"); ?>

 <!--[if IE 7]>
  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css">
  <script type="text/javascript" src="js/jquery.pnotify.js"></script>
  <link type="text/css" rel="stylesheet" href="jquery.pnotify.default.css" />
  <![endif]-->

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
       #container { padding-top: 60px; }
   </style>

    <script type="text/javascript">

    $(".collapse").collapse()

    </script>

      <script type="text/javascript">

    $(document).ready(function(){
       $('#type').tooltip({
       trigger: "hover",
          animation: true,
          html: true,
          placement: 'right'
        });
      });

  </script>

</head>

<body>
<?php

    if($editProfile->messages) {
      foreach ($editProfile->messages as $messages) {
        echo $messagetags;
    }

  }

    if ($editProfile->errors) {
      foreach ($editProfile->errors as $errors) {
        echo $messagetags;
    }

  }

?>

  <?php require_once("../inc/navbar.inc.php"); ?>
  <div id="container">
    <div class="container-fluid">
      <div class="row-fluid">

        <?php require_once("../inc/leftpane.inc.php"); ?>
        <div class="span10">
              <div class="well">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
                  <li><a href="#profile" data-toggle="tab">Password</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div class="tab-pane active fade in" id="home">
                    <form id="tab" method="post" name="profileupdate" action="">
                        <label>Username</label>
                        <input type="text" class="input-xlarge" name="user_name" value="<?php echo $_SESSION['user_name']; ?>" disabled>
                        <label>First Name</label>
                        <input type="text" class="input-xlarge" name="user_first_name" value="<?php echo $_SESSION['user_first_name']; ?>" required>
                        <label>Last Name</label>
                        <input type="text" class="input-xlarge" name="user_last_name" value="<?php echo $_SESSION['user_last_name']; ?>" required>
                        <label>Email</label>
                        <input type="text" class="input-xlarge" name="user_email" value="<?php echo $_SESSION['user_email']; ?>" required>
                        <label>More about urself <b class="icon-info-sign icon-large" id="type" rel="tooltip" data-title="You can write down useful stuff about urself, such as: What do you do for living, hobbies and so on..."></b></label>
                        <textarea class="form-control" rows="3" name="user_info" required><?php echo $_SESSION['user_info']; ?></textarea>
                        <div>
                        <hr />
                          <button class="btn btn-primary" type="submit" name="profileupdate">Update</button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade in" id="profile">
                  <form id="tab2" name="passwordupdate" method="post" action="">
                      <label>Current Password</label>
                      <input type="password" class="input-xlarge" name="user_current_password" required>
                      <label>New Password</label>
                      <input type="password" class="input-xlarge" name="user_new_password" required>
                      <label>Repeat Password</label>
                      <input type="password" class="input-xlarge" name="user_repeat_password" required>
                      <hr />
                      <div>
                          <button class="btn btn-primary" type="submit" name="passwordupdate">Update</button>
                      </div>
                  </form>
                  </div>
              </div> 

            </div>

          </div>

        </div>

      </div>

  </div>

  <hr>

    <footer>

      <p>&copy; CopyLeft - Use, Develop, Enjoye, GNU Public License</p>

    </footer>

<?php require_once("../inc/scripts.inc.php"); ?>

 <script>
    <?php if ($editProfile->messages) {  ?>   

      $('.center').notify({

        message: {text: '<?php echo $messages ?>'},

        type: 'success',

        closable: true,

        fadeOut: { enabled: true, delay: 8000 }

      }).show();

    <?php } ?>

     <?php if ($editProfile->errors) {  ?>   

      $('.center').notify({

        message: {text: '<?php echo $errors ?>'},

        type: 'error',

        closable: true,

        fadeOut: { enabled: true, delay: 8000 }

      }).show();

    <?php } ?>
 </script>

</body>
</html>

