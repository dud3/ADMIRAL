<?php if(!defined('INCLUDE_CHECK')) header("Location:../");

require_once("../classes/util.php");
require_once("../classes/Login.php");
    
    $login = new Login();
    $currentPage = basename($_SERVER['SCRIPT_NAME']);
    $workSpace = "/".$_SESSION['user_name'];
    $currentUser = $_SESSION['user_name'];

      function highlightLink($page){
          $currentPage = basename($_SERVER['SCRIPT_NAME']);
          $CSSclassName = 'class="active"';
          if($page == $currentPage) echo $CSSclassName;
        
      }

      function hideSameLink($link){
        $currentPage = basename($_SERVER['SCRIPT_NAME']);
        if($link == $currentPage) echo "#";
        else echo $link;
      }


      function foldersize($dir) {

       $count_size = 0;
       $count = 0;
       $dir_array = scandir($dir);

       foreach($dir_array as $key=>$filename) {

        if($filename!=".." && $filename!=".") {

         if(is_dir($dir."/".$filename)) {

            $new_foldersize = foldersize($dir."/".$filename);
            $count_size = $count_size + $new_foldersize[0];
            $count = $count + $new_foldersize[1];

         } else if(is_file($dir."/".$filename)) {

            $count_size = $count_size + filesize($dir."/".$filename);
            $count++;
         }

        }
       
       }

       $percentage = $count_size *100 / MAX_SIZE;

       return array($count_size, $count, $percentage);
      }

      function file_size($fsizebyte) {
    if ($fsizebyte < 1024) {
        $fsize = $fsizebyte." bytes";
    }elseif (($fsizebyte >= 1024) && ($fsizebyte < 1048576)) {
        $fsize = round(($fsizebyte/1024), 2);
        $fsize = $fsize." KB";
    }elseif (($fsizebyte >= 1048576) && ($fsizebyte < 1073741824)) {
        $fsize = round(($fsizebyte/1048576), 2);
        $fsize = $fsize." MB";
    }elseif ($fsizebyte >= 1073741824) {
        $fsize = round(($fsizebyte/1073741824), 2);
        $fsize = $fsize." GB";
    };
    return $fsize;
}
       
      $sample = foldersize("/var/www/$currentUser/");
       
      $sample[2] = $sample[2].'%';


?> 


  <div class="span2">
               <script>
              var g1, g2;
              
              window.onload = function(){
                var g1 = new JustGage({
                  id: "g1", 
                  value: 20, 
                  min: 0,
                  max: 100,
                  title: "CPU",
                  label: "GHz"
                });
                
                var g2 = new JustGage({
                  id: "g2", 
                  value: <?php echo $sample[0]; ?>, 
                  min: 0,
                  max: <?php echo MAX_SIZE ?>,
                  title: "Memory",
                  label: "GByte"
                });
                 
                setInterval(function() {
                    $.get('leftpane.inc.php', function () { g1.refresh(<?php echo $sample[0]; ?>); });
                          
                }, 2500);
              };
           </script>
                  <ul class="nav nav-tabs nav-stacked">
                   <li class="nav-header">Admiral header</li>
                   <li <?php highlightLink("index.php"); ?>><a href=<?php hideSameLink("index.php");?> class="text-error"> <b class="icon-home"></b>Home(<i>System Info</i>)</a></li>
                   <li <?php highlightLink("myAdmiral.php"); ?>> <a href=<?php hideSameLink("myAdmiral.php"); ?>><b class="icon-beaker"></b>My Admiral</a></li>
                   <li ><a href="<?php echo $workSpace; ?>" target="_blank"><b class=" icon-wrench"></b>Workspace</a></li>
                   <li <?php highlightLink("faq.php"); ?>><a href=<?php hideSameLink("faq.php"); ?>><b class="icon-h-sign"></b>Ask(FAQ)</a></li>
                   <li <?php highlightLink("manageUsers.php"); ?>><a href=<?php hideSameLink("manageUsers.php"); ?>><b class="icon-search"></b>Find People</a></li>
                   <?php if($login->getUserLevel() == '5'){ ?>
                   <li <?php highlightLink("clientmanage.php"); ?>><a href=<?php hideSameLink("clientmanage.php"); ?>><b class="icon-group"></b>Client Manager</a></li>
                   <?php } ?>
                   <?php if($currentPage == "index.php") { ?>
                   <li><a href="#Walk" id="demo" class="text-info"><b class="icon-road"></b>Take a Walkthrough</a></li>
                   <?php } ?>
                  </ul>
                  <?php if($currentPage != "index.php") { ?>
                  <p class="muted text-left"><?php echo file_size($sample[0]); ?> of <?php echo file_size(MAX_SIZE); ?></p>
                 <div class="progress">
                      <div class="bar" style="width: <?php echo $sample[2] ?>"><b style="color:black;">Disk usage <?php echo $sample[2]; ?></b></div>
                      </div>  
                       <div id="g1"></div>
                       <div id="g2"></div>
                  <?php } ?>
            </div>
         
