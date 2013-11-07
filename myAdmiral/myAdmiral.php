<?php
define('INCLUDE_CHECK',true);

require_once("../classes/util.php");

  $sshClient = "https://".$_SERVER['SERVER_ADDR'].":8080";
  $workSpace = "/".$_SESSION['user_name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>My Admiarl / Admiral</title>
<meta name="description" content="Creating sample grids using bootstrap">
<script type="text/javascript" src="../js/jquery.js"></script>
<?php require_once("../inc/styles.inc.php"); ?>

 <!--[if IE 7]>
  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css">
  <script type="text/javascript" src="js/jquery.pnotify.js"></script>
  <link type="text/css" rel="stylesheet" href="jquery.pnotify.default.css" />

  <![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style type="text/css">
       #container {padding-top: 60px;}
        #g1, #g2 {
        width:180px; height:120px;
        display: inline-block;
        margin: 0px, 0px, 0px, 0px;
        padding: 0px, 0px, 0px, 0px;
      }
   </style>
    <script>

      $(document).ready(function(){
        $(".web").popover({ 
          trigger: "hover",
          animation: true,
          html: true,
          placement: 'right'
      });
        $("button").popover({
          trigger: 'click',  
          animation: true,
          html: true,
          placement: 'bottom'
        });
        console.log("jimmy");
      });
    </script>

   
</head>

<body>
	<?php require_once("../inc/navbar.inc.php"); ?>
	<div id="container">
    <div class="container-fluid">
      <div class="row-fluid">
      	<?php require_once("../inc/leftpane.inc.php"); ?>
      	<div class="span10">
          <div class="hero-unit">
              <h1>My Admiral<img src="../ico/icomain.png" style="padding-left:5px;" /></h1>
              <p>
                &nbsp;This page provides you with most of our tools needed to edit/modify/delete/create PHP or C programming files, Shell scripting
                also with Web based FTP, SSH(Linux shell), Mysql Client and Inside FTP client there's a rich Text-editor. 
              </p>
          </div>

          <div class="span10">
              <div class="page-header">
                <div class="row-fluid">
                  <a href="<?php echo $workSpace; ?>" target="_blank" class="web" data-content="Workspace" rel="popover" data-original-title="<b class='text-info'>Workspace</b> must be used to get <b class='text-info'>access</b> to your files and <b class='text-info'>execute</b> them. <b class='text-info'>Workspace</b> will link you to your actual <b class='text-info'>Directory</b> Where you have been <b class='text-info'>uploaded, edited...</b> using either <b class='text-info'>FTP</b> or <b class='text-info'>SSH</b> client(s).">
                    <img src="../img/WorkSpace.png" />
                  </a>
                  <button class="btn btn-primary btn-large pull-right" class="mobile" data-toggle="button" rel="popover" data-content="Popwith option tigger"  data-original-title="Use  our Web-based CLI-T(Command Line - Terminal) or known as shell , for mnipulating and managing files folder (including config files) and also other utilities. Twice Enter Then your username' and passowrd">On mobile (info)</button>
                  <h2>Workspace<h5 class="text-info"><em>Works on Desktop, laptop and Tablet computers only</em></h5></h2>
                </div> 
              </div>
              
                <div class="page-header">
                <div class="row-fluid">
                  <a href="<?php echo $sshClient; ?>" target="_blank" class="web" rel="popover" data-content="SSH Client" rel="popover" data-original-title="Use our Web-based <b class='text-info'>CLI-T</b>(Command Line - Terminal) or known as shell , for mnipulating and managing files folder (including config files) and also other utilities. Twice <b class='text-info'>Enter</b> Then your <b class='text-info'>username</b> and <b class='text-info'>passowrd</b>.">
                    <img src="../img/SSH.png" />
                  </a>
                  <button class="btn btn-primary btn-large pull-right" class="mobile" data-toggle="button" data-placement="bottom" data-content="Popwith option tigger" rel="popover" data-original-title="Use our Web-based CLI-T(Command Line - Terminal) or known as shell , for mnipulating and managing files folder (including config files) and also other utilities. Twice Enter Then your username' and passowrd.">On mobile (info)</button>
                  <h2>SSH Client<h5 class="text-info"><em>Works on Desktop, laptop and Tablet computers only</em></h5></h2>
                </div> 
              </div> 

              <div class="page-header">
                <div class="row-fluid">
                  <a href="../services/ftpClient/ftpClient/files_to_upload/" target="_blank" class="web" rel="popover" data-content="FTP Client" rel="popover" data-original-title="You can use this version of FTP client to Upload , Download , View and edit filen on our system (included other futures). Please notify that where it says FTP server type: <b class='text-info'>localhost</b> and then ur <b class='text-info'>username</b> and <b class='text-info'>password</b>.">
                    <img src="../img/FTP_V3.png" />
                  </a>
                  <button class="btn btn-primary btn-large pull-right" data-toggle="button" data-placement="bottom" data-content="Popwith option tigger" rel="popover" data-original-title="Use our Web-based CLI-T(Command Line - Terminal) or known as shell , for mnipulating and managing files folder (including config files) and also other utilities. Twice Enter Then your username' and passowrd.">On mobile (info)</button>
                  <h2>FTP Client<h5 class="text-info"><em>Works on Desktop, laptop and Tablet computers only</em></h5></h2>
                </div> 
              </div>

              <div class="page-header">
                <div class="row-fluid">
                  <a href="../services/sqlClient/sqlClient/" target="_blank" class="web" rel="popover" rel="popover" data-content="SQL Client"  data-original-title="Use <b class='text-info'>phpMyAdmin</b> to<b class='text-info'> manage</b> / <b class='text-info'>manipulate</b> database , by loging in with your username and password to get access to the functionalities.">
                    <img src="../img/SQL_V3.png" />
                  </a>
                  <button class="btn btn-primary btn-large pull-right" data-toggle="button" data-placement="bottom" data-content="Popwith option tigger" rel="popover" data-original-title="Use our Web-based CLI-T(Command Line - Terminal) or known as shell , for mnipulating and managing files folder (including config files) and also other utilities. Twice Enter Then your username' and passowrd.">On mobile (info)</button>
                  <h2>SQL Client<h5 class="text-info"><em>Works on Desktop, laptop and Tablet computers only</em></h5></h2>
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
</body>
</html>
