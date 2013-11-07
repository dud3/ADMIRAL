<?php
if(!defined('INCLUDE_CHECK')) header("Location:../index.php");

require_once("../classes/util.php");
require_once("../conf/db.php");

	$connect = mysql_connect(DB_HOST , DB_USER, DB_PASS) or die('fail');
			   mysql_select_db(DB_NAME) or die('fail');

	$get_user_id = mysql_escape_string($_GET['user_id']);
	$get_user_name = mysql_escape_string($_GET['user_name']);

	$messages = array();
	$errors = array();

		$action = $_GET['action'];
		
		switch ($action) { 

	        case "suspend":
		        $query = mysql_query("UPDATE cw_users SET user_status = 'suspended' WHERE user_id = $get_user_id ") or die("im dead suspend");
		        if($query) {

		        		$messages[] = "The Desired User Has been Suspended Successfully";

		        } else {

		        		$errors[] = "Sorry The desired user failed to be suspended, please try again";
		        }

		    break;

	        case "delete":
		        $query = mysql_query("DELETE FROM cw_users WHERE user_id = $get_user_id ") or die("im dead");
		        if($query) {

		        		$messages[] = "The Desired User Has been Deleted Successfully";

		        } else {

		        		$errors[] = "Sorry The desired user failed to be suspended, please try again";
		        }

		    break;
	        
	        case "makeAdmin":
		        $query = mysql_query("UPDATE cw_users SET user_level = 5 WHERE user_id = $get_user_id ") or die("im dead");
		        if($query) {

		        		$messages[] = "The Desired User Now has Administrator priviledges";

		        } else {

		        		$errors[] = "Sorry The desired user failed to be suspended, please try again";
		        }

		    break;

		    case "unsuspend":
		    	  $query = mysql_query("UPDATE cw_users SET user_status = 'live' WHERE user_id = $get_user_id ") or die("im dead suspend");
		    	   if($query) {

		    	   		$messages[] = "The Desired user has ben Unsuspended Successfully";

		    	   } else {

		    	   		$errors[] = "Sorry The desired user failed to be Unsuspended, please try again";

		    	   }
		   	break;

		    default: 
	            "nothing";   
	}


?>