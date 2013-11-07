<?php if(!defined('INCLUDE_CHECK')) header("Location:../");
      $currentPage = basename($_SERVER['SCRIPT_NAME']);
?> 
<link rel="shortcut icon" href="../ico/ico.ico">
<link rel="stylesheet" href="../css/bootstrap.css" />
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/bootstrap-responsive.css">
<script type="text/javascript" src="../js/jquery.pnotify.js"></script>
<link rel="stylesheet" href="../css/jquery.pnotify.default.css" />
<link rel="stylesheet" href="../css/bootstro.css" />
<link rel="stylesheet" href="../css/jquery.validate.css" />
<?php if($currentPage == "manageUsers.php") { ?>
<link rel="stylesheet" href="../css/dtbootstrap.css" />
<?php } ?>