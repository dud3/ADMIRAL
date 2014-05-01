<?php

require_once('clientManagerRegistration.php');
// require_once("../inc/enc.php");

class ClientManagerFunctions extends ClientManagerRegistration {


	private 	$db_connection						= null;
	private 	$get_user_id						= "";						   // $_GET the user's ID number
	private 	$get_user_name						= "";						   // $_GET the user's name


	/**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */  

	public function __construct(){

		if(isset($_GET['action']) && $_GET['action'] == 'delete') {

			$this->deleteUser();

		} elseif(isset($_GET['action']) && $_GET['action'] == 'makeAdmin') {

  			$this->makeAdmin();

  		} elseif(isset($_GET['action']) && $_GET['action'] == 'suspend') {

  			$this->suspendUser();

  		} elseif(isset($_GET['action']) && $_GET['action'] == 'unsuspend') {

  			$this->unsuspendUser();

  		}

	}




	public function deleteUser() {

		$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (!$this->db_connection->connect_errno) {

			// escapin' this
		    $this->get_user_id     = $this->db_connection->real_escape_string($_GET['user_id']);
		    $this->get_user_name   = $this->db_connection->real_escape_string($_GET['user_name']);

            $checkdelete = $this->db_connection->query("SELECT * FROM cw_users WHERE user_id = '".$this->get_user_id."'");

            if($checkdelete->num_rows == 1) { 

				$query_delete_user = $this->db_connection->query("DELETE FROM cw_users WHERE user_id = '".$this->get_user_id."'");

			    if($query_delete_user) {

			    	$ssh = new Net_SSH2('localhost');
					if(!$ssh->login('ubuntu', '123123123')) {

                     $this->errors[] = "Sorry, no SSH Connection, or badly configured";

                    }

					$ssh->exec("sudo userdel $this->get_user_name");

					$this->db_connection->query("DROP USER $this->get_user_name@localhost");

			    	$this->messages[] = "The user [$this->get_user_name] has beend deleted successfully";

			    } else {

			    	$this->errors[] = "Failed to delete [$this->get_user_name], please try again.";

			    }

			} else { }			

		}

	}



	public function makeAdmin() {

		$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (!$this->db_connection->connect_errno) {

			// escapin' this
		    $this->get_user_id     = $this->db_connection->real_escape_string($_GET['user_id']);
		    // $this->get_user_id 	   = simple_decrypt($this->get_user_id);
		    $this->get_user_name   = $this->db_connection->real_escape_string($_GET['user_name']);

		    $checkadmin = $this->db_connection->query("SELECT * FROM cw_users WHERE user_id = '".$this->get_user_id."' AND user_level <= '4'");

		     if($checkadmin->num_rows == 1) {

				$query_makeAdmin_user = $this->db_connection->query("UPDATE cw_users SET user_level = '5' WHERE user_id = '".$this->get_user_id."'");

			    if($query_makeAdmin_user) {

			    $this->messages[] = "The user [$this->get_user_name] has Admin priviledges now.";

			    } else {

			    	$this->errors[] = "Failed to set Admin priviledges to the [$this->get_user_name], please try again.";

			    }

			} else { }

		}
	}



	public function suspendUser() {

		$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (!$this->db_connection->connect_errno) {

			// escapin' this
		    $this->get_user_id     = $this->db_connection->real_escape_string($_GET['user_id']);
		    $this->get_user_name   = $this->db_connection->real_escape_string($_GET['user_name']);


		    $checksuspend = $this->db_connection->query("SELECT * FROM cw_users WHERE user_id = '".$this->get_user_id."' AND user_status = 'live'");

			if($checksuspend->num_rows == 1) {

				$query_suspend_user = $this->db_connection->query("UPDATE cw_users SET user_status = 'suspended' WHERE user_id = '".$this->get_user_id."'");

			    if($query_suspend_user) {

			    	$ssh = new Net_SSH2('localhost');
					if(!$ssh->login('ubuntu', '123123123')) {

	                    $this->errors[] = "Sorry, no SSH Connection, or badly configured";

                    	}

						$ssh->exec("sudo usermod -L $this->get_user_name");

					    $this->messages[] = "The user [$this->get_user_name] has been suspended and locked successfully.";

			    } else {

			    	$this->errors[] = "Failed to suspend [$this->get_user_name], please try again.";

			    }

			} else { }

		}
	}




	public function unsuspendUser() {

		$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (!$this->db_connection->connect_errno) {

			// escapin' this
		    $this->get_user_id     = $this->db_connection->real_escape_string($_GET['user_id']);
		    $this->get_user_name   = $this->db_connection->real_escape_string($_GET['user_name']);

		    $checkunsuspend = $this->db_connection->query("SELECT * FROM cw_users WHERE user_id = '".$this->get_user_id."' AND user_status = 'suspended'");

		    if($checkunsuspend->num_rows == 1) {

				$query_unsuspend_user = $this->db_connection->query("UPDATE cw_users SET user_status = 'live' WHERE user_id = '".$this->get_user_id."'");

			    if($query_unsuspend_user) {

			    	$ssh = new Net_SSH2('localhost');
					if(!$ssh->login('ubuntu', '123123123')) {

	               		$this->errors[] = "Sorry, no SSH Connection, or badly configured";

                    }

					$ssh->exec("sudo usermod -U $this->get_user_name");

			    	$this->messages[] = "The user [$this->get_user_name] has been Unsuspended successfully.";

			    } else {

			    	$this->errors[] = "Failed to unsuspend [$this->get_user_name], please try again.";

			    }

			} else { }

		}

	}


}













?>
