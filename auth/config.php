

<?php 



// DB credentials.


// define('DB_HOST','67.23.254.53');

// define('DB_USER','alphacor_prod');

// define('DB_PASS','@1phac0ret3ch123');

// define('DB_NAME','alphacor_alphadash-sales');



define('DB_HOST','localhost');

define('DB_USER','root');

define('DB_PASS','');

define('DB_NAME','alphadash_inventory');

// Establish database connection.

try{

    $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

}catch (PDOException $e){

    exit("Error: " . $e->getMessage());

}



	// $servername = "67.23.254.53";

	// $DBusername = "alphacor_prod";

	// $DBpassword = "@1phac0ret3ch123";

	// $db_name = 'alphacor_alphadash-sales';



	$servername = "localhost";

	$DBusername = "root";

	$DBpassword = "";

	$db_name = "alphadash_inventory";

	

	// Create connection

	$conn = mysqli_connect($servername, $DBusername, $DBpassword);

	

	//Check connection

	if (mysqli_connect_errno())

	  {

	  echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>";

	  }

	

	$db_selected = mysqli_select_db($conn,$db_name);

	if (!$db_selected) {

		die ('Can\'t use : ' . mysqli_error($conn));

	}

	

	global $conn; 



    

?>
