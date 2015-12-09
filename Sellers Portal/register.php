<?php


//getting post variable
$email=($_POST['email']);
$password=($_POST['password']);
$mobile=($_POST['cno']);
$name=($_POST['name']);
$address=($_POST['address']);
$pin=($_POST['pin']);

$error = array();

if(empty($email) or !filter_var($email,FILTER_SANITIZE_EMAIL))
{
		$response["success"] = 0;
        $response["message"] = "Enter Email!!!";
        die(json_encode($response));
}
if(empty($password)){
		$response["success"] = 0;
        $response["message"] = "Enter Password!!!";
        die(json_encode($response));
}
if(empty($name)){
		$response["success"] = 0;
        $response["message"] = "Enter Name!!!";
        die(json_encode($response));
}
if(empty($mobile)){
		$response["success"] = 0;
        $response["message"] = "Enter Mobile!!!";
        die(json_encode($response));
}


//database configuration
$database_name = 'firstcopy';
$database_user_name = 'admin';
$database_password = 'E1es57Y5dE4W';
$dbhost=$OPENSHIFT_MONGODB_DB_HOST;

//if you have database user name & password then connection may be
//$connection=new Mongo("mongodb://$database_user_name:$database_password@$dbhost");

//Currently we are connecting to mongodb without authentication


try{
	$db_connection = getenv('OPENSHIFT_MONGODB_DB_URL') ? getenv('OPENSHIFT_MONGODB_DB_URL') . $db_name : "mongodb://localhost:27017/" . $db_name;
	$connection=new MongoClient("$db_connection");
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


//checking the mongo database connection
if($connection){
 echo 'Success';
//connecting to database

$databse=$connection->$database_name;

//connect to specific collection
$collection=$databse->seller_info;

$query=array('mobile'=>$mobile);
//checking for existing mobile
$count=$collection->findOne($query);


if(!count($count)){
//Save the New user
$user_data=array('email'=>$email,'password'=>$password,'name'=>$name,'mobile'=>$mobile,'mobile'=>$mobile,'address'=>address,'pin'=>$pin);
$collection->save($user_data);
$response["success"] = 1;
        $response["message"] = "Registered";
        die(json_encode($response));
}else{
$response["success"] = 0;
        $response["message"] = "Mobile or Email already exists";
        die(json_encode($response));
}

}else{
 die("Database are not connected");
}

?>
