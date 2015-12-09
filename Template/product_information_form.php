<?php
//getting post variable
$name=($_POST['name']);
$price=($_POST['price']);
$brand=($_POST['brand']);
$type=($_POST['type']);
$discount=($_POST['discount']);
 
$error = array();
 
if(empty($name) )
{
		$response["success"] = 0;
        $response["message"] = "Enter Item Name!!!";
        die(json_encode($response));
}
if(empty($price)){
		$response["success"] = 0;
        $response["message"] = "Enter Price!!!";
        die(json_encode($response));
}
if(empty($brand)){
		$response["success"] = 0;
        $response["message"] = "Enter Brand!!!";
        die(json_encode($response));
}
if(empty($type)){
		$response["success"] = 0;
        $response["message"] = "Enter Type!!!";
        die(json_encode($response));
}
if(empty($discount)){
		$response["success"] = 0;
        $response["message"] = "Enter Discount!!!";
        die(json_encode($response));
}


//database configuration
$database_name = 'users';
$database_user_name = 'admin';
$database_password = 'admin';
//$dbhost=$OPENSHIFT_MONGODB_DB_HOST;
 
//if you have database user name & password then connection may be
//$connection=new Mongo("mongodb://$database_user_name:$database_password@$dbhost");
 
//Currently we are connecting to mongodb without authentication


try{
	//$db_connection = getenv('OPENSHIFT_MONGODB_DB_URL') ? getenv('OPENSHIFT_MONGODB_DB_URL') . $db_name : "mongodb://localhost:27017/" . $db_name;
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


//checking the mongo database connection
if($connection){
 echo 'Success';
//connecting to database

$databse=$connection->$database_name;

//connect to specific collection
$collection=$databse->products;
 
$query=array('name'=>$name);
//checking for existing mobile
$count=$collection->findOne($query);


 
if(!count($count)){
//Save the New user
$user_data=array('name'=>$name,'price'=>$price,'brand'=>$brand,'type'=>$type,'discount'=>$discount);
$collection->save($user_data);
$response["success"] = 1;
        $response["message"] = "Added";
		//header("location:index.html");
        die(json_encode($response));
}else{
$response["success"] = 0;
        $response["message"] = "Item already exists";
        die(json_encode($response));
}
 
}else{
 die("Database are not connected");
}
 
?>
