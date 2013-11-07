<?php

/**
 * Configuration file for: Database Connection 
 * This is the place where your database login constants are saved
 * 
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/questions/2447791/define-vs-const
 */


/** +----------------------SSH Configuration-----------------------+ */
	/** I difened SSH configuration just to be able to make the
				difference between database and SSH */

// SSH host, which usually must be localhost, since the application is located at the same machine
define("SSH_HOST", "localhost");

// super priviledged user root, superman of the users :D 
define("SSH_USER", "root");

// root password 
define("SSH_PASS", "123123");

// define SSH port 
define("SSH_PORT", "22");

// define gateone web-ssh port
define("GATEONE_PORT", "8080");


/** +----------------------File upload limitation Configuration-----------------------+ */

// in byte level wich means 50 Mib limited 
define("MAX_SIZE", "5300000");