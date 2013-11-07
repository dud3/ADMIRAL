<?php

define('INCLUDE_CHECK',true);

?>



<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<title>FaQ &middot; Admiral</title>

<meta name="description" content="Creating sample grids using bootstrap">

<script type="text/javascript" src="../js/jquery.js"></script>

<script type="text/javascript" src="../js/jquery.pnotify.js"></script>

<?php require_once("../inc/styles.inc.php"); ?>



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

        $(".collapse").collapse()

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

              <h1>About Admiral<img src="../ico/icomain.png" style="padding-left:5px;" /></h1>

              <p>

                &nbsp;<abbr title="Admiral Documentation">Admiral</abbr> provides a great working/training enviroment in PHP, C, C++

                programmers, a gcc complier(only for peacefull purposes), each user with an &nbsp;unique MySQL database and also shell scripting for young system administrators, or students who wish to test their &nbsp;skills.

              </p>

          </div>

          <div class="span10">

            <div class="row-fluid">

                  <h6>Extra container:</h6> 

                 <div class="accordion" id="accordion2">  

            <div class="accordion-group">  

              <div class="accordion-heading">  

                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">  

                  How to upload Files 

                </a>  

              </div>  

              <div id="collapseOne" class="accordion-body collapse" style="height: 0px; ">  

                <div class="accordion-inner">  

                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  

                </div>  

              </div>  

            </div>  

            <div class="accordion-group">  

              <div class="accordion-heading">  

                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">  

                 How to use FTP CLient

                </a>  

              </div>  

              <div id="collapseTwo" class="accordion-body collapse">  

                <div class="accordion-inner">  

                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  

                </div>  

              </div>  

            </div>  

            <div class="accordion-group">  

              <div class="accordion-heading">  

                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">  

                  How to login to the SSH Client 

                </a>  

              </div>  

              <div id="collapseThree" class="accordion-body collapse">  

                <div class="accordion-inner">  

                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  

                <ul class="thumbnails">

                <li class="span4">

                  <a href="#" class="thumbnail">

                    <img data-src="holder.js/300x200" alt="">

                  </a>

                </li>

                ...

              </ul>

                </div>  

              </div>  

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

