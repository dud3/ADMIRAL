<?php if(!defined('INCLUDE_CHECK')) header("Location:../");
      $currentPage = basename($_SERVER['SCRIPT_NAME']);

require_once("../classes/util.php");
require_once("../classes/Login.php");
require_once("../conf/conf.php");

// require_once("../inc/enc.php");

  $login = new Login();            
  $hostIp = $_SERVER['REMOTE_ADDR'];
  $sshClient = "https://46.149.18.88";
  // $sshClient = "https://".$_SERVER['SERVER_ADDR'].":8080";
  $currentUser = $_SESSION['user_name'];
  $user_last_loggedin = $_SESSION['user_last_loggedin'];
  // $redirect = simple_encrypt(util::get_current_url());
  $redirect = urlencode(util::get_current_url());

  $login->getUserLevel();

    if ($login->isUserLoggedIn() != true) {      

            header("Location: ../?redirect=$redirect&IPregistered=$hostIp&old_usr=$currentUser");
        }

    function highlightLink_($page){
          $currentPage = basename($_SERVER['SCRIPT_NAME']);
          $CSSclassName = 'class="active"';
          if($page == $currentPage) echo $CSSclassName;
        
      }

    function hideSameLink_($link){
        $currentPage = basename($_SERVER['SCRIPT_NAME']);
        if($link == $currentPage) echo "#";
        else echo $link;
      }

?> 
  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner bootstro" data-bootstro-title='Hello, I am a normal BOOTSTRAP popover' 
       data-bootstro-content="Because bootstrap rocks. Life before bootstrap was sooo miserable"
       data-bootstro-width="400px" 
       data-bootstro-placement='bottom' data-bootstro-step='1'>
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </a>
          <a class="brand" href="myAdmiral.php">Admiral</a>
          <!-- Navbar -->
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="divider-vertical"></li>
              <li <?php highlightLink_("index.php"); ?>><a href="index.php"><i class="icon-home icon-large"></i> Home</a></li>
              <li class="divider-vertical"></li>
            </ul>
            <ul class="nav pull-right">
              <li class="divider-vertical"></li>
              <li><a href="?logout"><b class="icon-off icon-large"></b>Logout</a></li> 
              <li class="divider-vertical"></li>
              <li class="dropdown">  
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b class="icon-cogs icon-large"></b><b class="icon-caret-down"></b></a>  
                <ul class="dropdown-menu"> 
                  <li><a href="profile.php"><b class="icon-user icon-large"></b>Profile</a></li>
                  <li class="disabled"><a href="#"><b class="icon-cog icon-large"></b>Settings</a></li>  
                  <li class="divider"></li> 
                  <li><a href="?logout"><b class="icon-off icon-large"></b>Logout</a></li> 
                </ul>  
              </li>   
            </ul>
            <ul class="nav pull-right">
              <li><a href="#profile"><small>Welcome <em class="text-info"><?php echo $currentUser; ?></em>, Last Log: <em class="text-info"><?php echo $user_last_loggedin; ?></em></small></a></li>
              <li class="divider-vertical"></li>
                <li class="dropdown">  
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><small>Quick Acess(<i class="text-info">Web-Clients</i>)</small><b class="icon-chevron-down icon-large"></b></a>  
                  <ul class="dropdown-menu"> 

                    <li><a href="<?php echo $sshClient; ?>" target="_blank">SSH Client <b class="icon-desktop icon-large"></b></a></li> 
                    <li><a href="../services/ftpClient/ftpClient/files_to_upload/" target="_blank">FTP Client <b class="icon-download-alt icon-large"></b></a></li>
                    <li><a href="../services/sqlClient/sqlClient/" target="_blank">SQL Client <b class="icon-hdd icon-large"></b></a></li>  

                    <li class="divider"></li>
                    <li><a href="manageUsers.php">Find People <b class="icon-search icon-large"></b></a></li> 
                  </ul>  
                </li>   
            </ul>
          </div>
        </div><!--/.nav-collapse -->
      </div>
    </div>