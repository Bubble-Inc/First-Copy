<?php
session_start();
 //database configuration
$database_name = 'firstcopy';
$database_user_name = 'admin';
$database_password = 'E1es57Y5dE4W';
$dbhost=$OPENSHIFT_MONGODB_DB_HOST;

//if you have database user name & password then connection may be
//$connection=new Mongo("mongodb://$database_user_name:$database_password@$dbhost");

//Currently we are connecting to mongodb without authentication


try{
//	$db_connection = getenv('OPENSHIFT_MONGODB_DB_URL') ? getenv('OPENSHIFT_MONGODB_DB_URL') . $db_name : "mongodb://localhost:27017/" . $db_name;
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
$collection=$database->seller_info;

}catch (MongoException $ex) {
        // For testing, you could use a die and message. 
       // die("Failed to run query: " . $ex->getMessage());
      echo  $ex->getMessage();
        //or just use this use this one to product JSON data:
							}

							
			
			try{
			$userDatabaseFind = $collection->find(array('email' => $_POST['email'])); //Does a search for Email in DB with the posted Email Variable
				//Iterates through the found results
				foreach($userDatabaseFind as $userFind) 
				{
				    $storedUsername = $userFind['email'];
				    $storedPassword = $userFind['password'];
				}	
				if($_POST['email'] == $storedUsername && $_POST['password'] == $storedPassword && $_POST['email']==!null && $_POST['password']==!null)
		{   
		$response["success"] = 1;
        $response["message"] = "Login Success!!!";
		$_SESSION['email']=$_POST['email'];
		header('Location: categories.html');	
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
	
		
	
?>
