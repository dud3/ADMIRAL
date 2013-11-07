<?php

class editProfile {

	private $db_connection				= null; 					// Database connection

	private $user_first_name 			= "";						// First name
	private $user_last_name 			= "";						// Last name
	private $user_name 					= "";						// User's name
	private $user_email					= "";						// User email
	private $user_info					= "";						// User info
	private $user_current_password		= "";						// User's current password
	private $user_new_password			= "";						// User's new password
	private $user_repeat_password		= "";						// Repeat the same password

	private $user_password_hash 		= "";						// Hashed password

	public $update_successful			= fasle;					// If successful

	public $errors						= array();					// Array to handle erros
	public $messages					= array();					//   =   to handle messages


	public function __construct() {

		session_start();

		if(isset($_POST['profileupdate'])) {

			$this->updateProfile();

		} elseif(isset($_POST['passwordupdate'])) {
			
			$this->updatePassword();
		}

	}

	private function updateProfile() {

		if(empty($_POST['user_first_name'])) {

			$this->errors[] = "Please type your firstname";

		} elseif(empty($_POST['user_last_name'])) {

			$this->errors[] = "Please type your lastname";

		} elseif(empty($_POST['user_email'])) {

			$this->errors[] = "Please type your Email";

		} elseif(!empty($_POST['user_first_name'])
			&& !empty($_POST['user_last_name'])
			&& !empty($_POST['user_email'])) {

           $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
           if(!$this->db_connection->connect_errno) {

           	$this->user_name 	   = $this->db_connection->real_escape_string($_POST['user_name']);
           	$this->user_first_name = $this->db_connection->real_escape_string($_POST['user_first_name']);
           	$this->user_last_name  = $this->db_connection->real_escape_string($_POST['user_last_name']);
           	$this->user_email	   = $this->db_connection->real_escape_string($_POST['user_email']);
           	$this->user_info	   = $this->db_connection->real_escape_string($_POST['user_info']);


				$query_user_update = $this->db_connection->query("UPDATE cw_users SET user_first_name = '".$this->user_first_name."', user_last_name = '".$this->user_last_name."', user_email = '".$this->user_email."', user_info = '".$this->user_info."' WHERE user_name = '".$_SESSION['user_name']."' ");           		


           	if($query_user_update) {

           		$this->messages[] = "Your Profile has been changed successfully. You will see the changes after next login.";
           		$this->update_successful = true;
           		session_regenerate_id();
           	
           	} else {

           		$this->errors[] = "Sorry, please ty again to change your profile.";

           	}


          } else {

          	$this->errors[] = "sorry, no Database connection.";

          }


		}

	}

	private function updatePassword() {

		if(empty($_POST['user_current_password'])) {

			$this->errors[] = "Please type your current password";

		} elseif(empty($_POST['user_new_password'])) {

			$this->errors[] = "Please type your new password";

		} elseif(empty($_POST['user_repeat_password'])) {

			$this->errors[] = "Please repeat your password";

		} elseif(!empty($_POST['user_current_password']) 
			&& !empty($_POST['user_new_password'])
			&& !empty($_POST['user_repeat_password'])) {


		if($_POST['user_new_password'] != $_POST['user_repeat_password']) {

			$this->errors[] = "Your new and repeat password must be the same";

		} else {

			$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			if(!$this->db_connection->connect_errno) {

				// escape stuff
				$this->user_current_password = $this->db_connection->real_escape_string($_POST['user_current_password']);
				$this->user_new_password = $this->db_connection->real_escape_string($_POST['user_new_password']);
				$this->user_repeat_password = $this->db_connection->real_escape_string($_POST['user_repeat_password']);

				// cut down the charactes to max 64 chars
				$this->user_current_password = substr($this->user_current_password, 0, 64);
				$this->user_new_password = substr($this->user_new_password, 0, 64);
				$this->user_repeat_password = substr($this->user_repeat_password, 0, 64);

				// check if the current password is right
				$query_check_password = $this->db_connection->query("SELECT * FROM cw_users WHERE user_name = '".$_SESSION['user_name']."' ");

					if ($query_check_password->num_rows == 1) {

                    	// get result row (as an object)
                    	$result_row = $query_check_password->fetch_object();

                    		if (crypt($_POST['user_current_password'], $result_row->user_password_hash) != $result_row->user_password_hash) {

                    			$this->errors[] = "Your current password is wrong, please try again";

                    	} else { 

				                // generate random string "salt", a string to "encrypt" the password hash
				                // this is a basic salt, you might replace this with a more advanced function
				                // @see http://en.wikipedia.org/wiki/Salt_(cryptography)

				                function get_salt($length) {

				                    $options = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789./';
				                    $salt = '';

				                    for ($i = 0; $i <= $length; $i ++) {
				                        $options = str_shuffle ( $options );
				                        $salt .= $options [rand ( 0, 63 )];
				                    }
				                    return $salt;
				                }

				                // using the standard php salt length
				                $max_salt = CRYPT_SALT_LENGTH;

				                // hard to explain, this part of the upcoming hash string is some kind of parameter, defining
				                // the intensity of calculation. we are using the blowfish algorithm here, please see
				                // @see php.net/manual/en/function.crypt.php
				                // for more information.
				                $hashing_algorithm = '$2a$10$';

				                //get the longest salt, could set to 22 crypt ignores extra data
				                $salt = get_salt($max_salt);

				                //append salt data to the password, and crypt using salt, results in a 60 char output
				                $this->user_password_hash = crypt($this->user_new_password, $hashing_algorithm.$salt);


                    			$query_update_password = $this->db_connection->query("UPDATE cw_users SET user_password_hash = '".$this->user_password_hash."' WHERE user_name = '".$_SESSION['user_name']."' ");

                    			if($query_update_password) {

                    				$this->messages[] = "You have changed your password successfully";

                    			} else {

                    				$this->errors[] = "You failed to change your password, please fill carefull and try again";

                    		}


                    	}


                	}


				}

			}


		}	


	}	

}


?>