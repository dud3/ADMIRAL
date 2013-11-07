<?php
define('INCLUDE_CHECK',true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Home(System Info) / Admiral</title>
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
        width:200px; height:160px;
        display: inline-block;
        margin: 0px, 0px, 0px, 0px;
        padding: 0px, 0px, 0px, 0px;
      }
        #g3, #g4 {
        width:100px; height:80px;
        display: inline-block;
        margin: 0px, 0px, 0px, 0px;
        padding: 0px, 0px, 0px, 0px;
      }
   </style>
   <script>
      var g1, g2;
      
      window.onload = function(){
        var g1 = new JustGage({
          id: "g1", 
          value: getRandomInt(0, 100), 
          min: 0,
          max: 100,
          title: "CPU",
          label: "GHz"
        });
        
        var g2 = new JustGage({
          id: "g2", 
          value: getRandomInt(0, 100), 
          min: 0,
          max: 100,
          title: "Memory",
          label: "GByte"
        });
         
        setInterval(function() {
          g1.refresh(getRandomInt(50, 100));
          g2.refresh(getRandomInt(50, 100));          
        }, 2500);
      };
    </script>
</head>

<body>
	<?php require_once("../inc/navbar.inc.php"); ?>
	<div id="container">
    <div class="container-fluid">
      <div class="row-fluid">
      	<?php require_once("../inc/leftpane.inc.php"); ?>
      	<div class="span10">
          <div class="hero-unit bootstro" 
               data-bootstro-title='Hello, I am a normal BOOTSTRAP popover' 
               data-bootstro-content="Because bootstrap rocks. Life before bootstrap was sooo miserable"
               data-bootstro-width="400px" 
               data-bootstro-placement='bottom' data-bootstro-step='0'>
              <h1>My Admiral<img src="../ico/icomain.png" style="padding-left:5px;" /></h1>
              <p>
                &nbsp;<abbr title="Admiral Documentation">Admiral</abbr> provides a great working/training enviroment in PHP, C, C++
                programmers, a gcc complier(only for peacefull purposes), each user with an &nbsp;unique MySQL database and also shell scripting for young system administrators, or students who wish to test their &nbsp;skills.
              </p>
          </div>

                <div class="span4 bootstro"
                     data-bootstro-title='Hello, I am a normal BOOTSTRAP popover' 
                     data-bootstro-content="Because bootstrap rocks. Life before bootstrap was sooo miserable"
                     data-bootstro-width="400px" 
                     data-bootstro-placement='bottom' data-bootstro-step='2'>
                 
                     <div class="progress">
                      <div class="bar" style="width: 20%"><a href="#" rel="tooltip" title="first tooltip" style="color:white">Disk usage</a></div>
                      </div>
                      <div class="progress">
                      <div class="bar bar-success" style="width: 40%"><a href="#" rel="tooltip" title="first tooltip" style="color:white">Workflow</a></div>
                      </div>
                      <div class="progress">
                      <div class="bar bar-warning" style="width: 60%"><a href="#" rel="tooltip" title="first tooltip" style="color:white">Bandwidth</a></div>
                      </div>
                      <div class="progress">
                      <div class="bar bar-danger" style="width: 80%">Network Activities</div>
                      </div>
               </div>
               <div class="span6">
                  <div id="g1"></div>
                  <div id="g2"></div>
                </div>

          <div class="span10 bootstro"
               data-bootstro-title='Hello, I am a normal BOOTSTRAP popover' 
               data-bootstro-content="Because bootstrap rocks. Life before bootstrap was sooo miserable"
               data-bootstro-width="250px" 
               data-bootstro-placement='left' data-bootstro-step='3'>
            <div class="row-fluid">
                  <h6>Extra container:</h6> 
                  <p><a href="#" data-toggle="tooltip" data-placement="top" title="Tooltip on top"> here </a>
                    &nbsp;Nullam <abbr title="attribute">attr quis risus</abbr> eget urna mollis ornare vel eu leo. Cum
                     sociis natoque penatibus et magnis dis parturient montes, nascetur 
                    ridiculus mus. Nullam id dolor id nibh ultricies vehicula.
                                Cum sociis natoque penatibus et magnis dis parturient 
                    montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor
                     fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor </p>ridiculus mus. Nullam id dolor id nibh ultricies vehicula.
                                Cum sociis natoque penatibus et magnis dis parturient 
                    montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor
                     fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor </p>ridiculus mus. Nullam id dolor id nibh ultricies vehicula.
                                Cum sociis natoque penatibus et magnis dis parturient 
                    montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor
                     fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor </p>ridiculus mus. Nullam id dolor id nibh ultricies vehicula.
                                Cum sociis natoque penatibus et magnis dis parturient 
                    montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor
                     fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor </p>ridiculus mus. Nullam id dolor id nibh ultricies vehicula.
                                Cum sociis natoque penatibus et magnis dis parturient 
                    montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor
                     fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor </p>ridiculus mus. Nullam id dolor id nibh ultricies vehicula.
                                Cum sociis natoque penatibus et magnis dis parturient 
                    montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor
                     fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor </p>ridiculus mus. Nullam id dolor id nibh ultricies vehicula.
                                Cum sociis natoque penatibus et magnis dis parturient 
                    montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor
                     fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor </p>ridiculus mus. Nullam id dolor id nibh ultricies vehicula.
                                Cum sociis natoque penatibus et magnis dis parturient 
                    montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor
                     fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor </p>
                      <script type="text/javascript">
                     

                        </script>
                        <button type="button" class="btn btn-primary" data-toggle="button" id="toggle">Single Toggle</button>

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
    $(document).ready(function(){
        $("#demo").click(function(){
            bootstro.start();    
        });
        $(".demo_stopOn").click(function(){
            alert('Clicking on the backdrop or Esc will NOT stop the show')
            bootstro.start('.bootstro', {stopOnBackdropClick : false, stopOnEsc:false});    
        });
        $(".demo_size1").click(function(){
            bootstro.start('.bootstro_size1');    
        });
        $(".demo_nonav").click(function(){
            bootstro.start('.bootstro', {
                nextButton : '',
                prevButton : '',
                finishButton : ''
            });    
        });
        
    });
  </script>
</body>
</html>
