<?php if(!defined('INCLUDE_CHECK')) header("Location:../");
      $currentPage = basename($_SERVER['SCRIPT_NAME']);
?> 
  <div class="span4">
                 
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