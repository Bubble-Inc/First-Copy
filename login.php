<?php
session_start();
 //database configuration
$database_name = 'users';
$database_user_name = 'admin';
$database_password = 'admin';
$collection="user";
$storedUsername="";
$storedPassword="";

// connect to mongodb
try{
	//$db_connection = getenv('OPENSHIFT_MONGODB_DB_URL') ? getenv('OPENSHIFT_MONGODB_DB_URL') . $database_name : "mongodb://localhost:27017/" . $database_name;
	$connection=new MongoClient();
	}
		catch ( MongoConnectionException $e )
		{
		// if there was an error, we catch and display the problem here
		echo $e->getMessage();
		}
		catch ( MongoException $e )
		{
		echo $e->getMessage();
		}

try{
 //gets user's info based off of a username.
 $database=$connection->$database_name;

//connect to specific collection
$collection=$database->$collection;

}catch (MongoException $ex) {
        // For testing, you could use a die and message. 
       // die("Failed to run query: " . $ex->getMessage());
      echo  $ex->getMessage();
        //or just use this use this one to product JSON data:
							}

							
			
			try{
			$userDatabaseFind = $collection->find(array('email' => $_POST['email'])); //Does a search for Email with the posted email Variable
				//Iterates through the found results
				
				foreach($userDatabaseFind as $userFind) 
				{
				    $storedUsername = $userFind['email'];
				    $storedPassword = $userFind['password'];
					$storedName=$userFind['name'];
				}	
				if($_POST['email'] == $storedUsername && $_POST['password'] == $storedPassword)
		{   
		$response["success"] = 1;
        $response["message"] = "Login Success!!!";
		$_SESSION['name']=$storedName;
		
		echo $_SESSION['name'];
		header("location:index.html");
		
        die(json_encode($response));
		
        }
		else{
		 $response["success"] = 0;
        $response["message"] = "Error. Please Try Again!";
        die(json_encode($response));	
			}
		}catch (Exception $ex) {
        // For testing, you could use a die and message. 
       // die("Failed to run query: " . $ex->getMessage());
      echo  $ex->getMessage();
        //or just use this use this one to product JSON data:
							}														
	echo 'Connected';
		
	
?>
