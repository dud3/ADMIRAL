<?php 
define('INCLUDE_CHECK',true);

 function randomize(){
      $random = rand(1,6);
      echo $random;
      }
  
  // Get all required config stuff 
  require_once("conf/db.php");
  require_once("inc/enc.php");

  // Get two main classes for Registration and Login
  require_once("classes/Registration.php");
  require_once("classes/Login.php");

  // Create objects
  $registration = new Registration();
  $login = new Login();

  // Erorr message for each time Login or Registration fails e.x.: Email is taken
  $messagetags = "<div class='notifications center'></div>";
  $url_error = '?message=error';
  $url_success = '?message=success';
  //$camefrom = simple_decrypt($_GET['redirect']);
    $camefrom = urldecode($_GET['redirect']);
  
  // Return where it came from or if it's not set at all deffault is myAdmiral
  if(isset($_GET['redirect'])){

    $camefrom = str_replace("?logout", "", $camefrom);

      } else {

      $camefrom = "myAdmiral/myAdmiral.php";

    }

  // If user is loged in Redirect where he came from or just loged in redirect to the main page myAdmiral   
  if($login->isUserLoggedIn() == true) {
      header("Location: $camefrom");
    }

  /* Just testing ;)
  if($_POST){

    var_dump($_POST);
  } 
  */

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Welcome to Admiral &middot; Sign in, Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link href="css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link rel="stylesheet" href="css/jquery.validate.css" />
<link href="css/bootstrap-notify.css" rel="stylesheet" />
<link href="css/styles/alert-bangtidy.css" rel="stylesheet" />
<link href="css/styles/alert-blackgloss.css" rel="stylesheet" />
<link href="css/styles/alert-notification-animations.css" rel="stylesheet" />
  <!--[if IE 7]>
  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css">
  <![endif]-->
<style type="text/css">

body {
    padding-top: 40px;
    padding-bottom: 10px;
    margin: 0;
    background: url('img/<?php randomize() ?>.jpg')center center no-repeat fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.form-signin, .form-register {
    max-width: 300px;
    padding: 19px 29px 29px;
    margin: 0 auto 20px;
    background-color: #D0D0D0;
    border: 1px solid #e5e5e5;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
    box-shadow: 0 1px 2px rgba(0,0,0,.05);
}


.form-signin, .form-register input[type="text"],
.form-signin, .form-register input[type="password"], .form-register input[type="email"] {
    font-size: 16px;
    height: auto;
    margin-bottom: 15px;
    padding: 7px 9px;
}
.input-signin-email, .input-signin-password {
  width:250px;
}


.drop-shadow { text-shadow: 4px 4px 8px black; color: #FFFFFF;}


</style>
<link href="css/bootstrap-responsive.css" rel="stylesheet" />
<script src="js/jquery.js" type="text/javascript"></script>


<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Fav and touch icons -->
<link rel="shortcut icon" href="ico/ico.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
<script type="text/javascript" src="js/validate.js"></script>

<script type="text/javascript">
             $(document).ready(function(){
                   $("#user_name").focus();
                    $('#login').click(function(){
                      $(this).button('loading');
                 });
              });

        </script>

</head>

<body>
  <!-- Error messages and Successfull messages -->
  <?php
      // Show negative login messages
    if($login->errors){
      foreach ($login->errors as $error) {
        echo $messagetags;
        }
    }

    // Show successfully logout message
    if($login->messages){
      foreach ($login->messages as $message) {
        echo $messagetags;
      }
    }

    // Show negative registration messages
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
          echo $messagetags;
        }
    }

    // Show positive registration messages
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
          echo $messagetags;
        }
    }
  ?>

  <div class="container-fluid">
   <div class="row-fluid">
    <div class="span8"><h1 class="drop-shadow">Welcome to Admiral<br /><small> Enjoy one-step development/experimentation within your indigenous environment</h1></div>
      <div class="span4">
        <form class="form-signin" method="post" action="" name="login">
          <h4 class="form-signin-heading">Sign in here</h4>
        <div class="control-group">
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-envelope"></i></span>
              <input type="text" name="user_name" id="user_name" class="input input-signin-email" placeholder="Username or Email address">
            </div>
            <div class="input-prepend">
              <span class="add-on"><i class="icon-key"></i></span>
              <input type="password" name="user_password" id="user_password" class="input input-signin-password" placeholder="Password">
            </div>
          </div>
        </div>
        <label class="checkbox">
        <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-noraml btn-block btn-primary" type="submit" name="login" id="login" data-loading-text="Loading...">Sign in</button>
    </form>
    <form class="form-register" method="post" action="" name="register">
        <h2 class="form-register-heading">New To Admiral</h2> 

        <input type="text" name="user_first_name" id="user_first_name" class="input input-name span6" placeholder="First Name" required>
        <input type="text" name="user_last_name" id="user_last_name" class="input input-surname span6"  placeholder="Last Name" required>
        <input type="text" name="user_name" id="user_name" class="input-block-level" placeholder="Username" required>
        <input type="email" name="user_email" id="user_email" class="input-block-level" placeholder="Email Address" required> 
        <input type="password" name="user_password_new" id="user_password_new" class="input-block-level" placeholder="Password" required> 
        <input type="password" name="user_password_repeat" id="user_password_repeat" class="input-block-level" placeholder="Retype Password" required> 
        <button class="btn btn-large btn-block btn-inverse" type="submit" name="register">Register</button> 
    </form> 


  </div>
</div>
  <div class="row-fluid">
    <hr> 
      <footer class="drop-shadow">&copy; CopyLeft - Use, Develop, Enjoye, GNU Public License</footer> 
    </div> 
  </div>
    <!-- /container -->
     <!-- Le javascript ================================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <?php require_once('inc/scripts-backhome.inc.php'); ?> 

      <script>
    <?php if ($registration->errors || $login->errors)  {?>
      $('.center').notify({
        message: { text: '<?php echo "$error" ?>!'},
        type: 'error',
        closable: true,
        fadeOut: { enabled: true, delay: 8000 }
       }).show(); 
    <?php }?>
       
    <?php if ($registration->messages || $login->messages) {  ?>   
      $('.center').notify({
        message: {text: '<?php echo $message ?>'},
        type: 'success',
        closable: true,
        fadeOut: { enabled: false, delay: 18000 }
      }).show();
    <?php } ?>
    </script>
    
    
  </body> 
  </html> 
