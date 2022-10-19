<?php 



// DB credentials.

// define('DB_HOST','110.4.45.184');

// define('DB_USER','ajebesto_alphacor_prod');

// define('DB_PASS','alphacor123');

// define('DB_NAME','ajebesto_alphadash_inventory');



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



    // $servername = "110.4.45.184";

	// $DBusername = "ajebesto_alphacor_prod";

	// $DBpassword = "alphacor123";

	// $db_name = 'ajebesto_alphadash_inventory';



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