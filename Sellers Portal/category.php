<?php
session_start();
$seller = $_SESSION['email'];
require 'Cloudinary.php';
require 'Uploader.php';
require 'Api.php';
\Cloudinary::config(array( 
  "cloud_name" => "www-fcshop-in", 
  "api_key" => "892414419442113", 
  "api_secret" => "7TNAx6phiZ0qqm9moTdxz2EGvSU" 
));
//getting post variable
//$category=$_GET['category'];
$category=$_SESSION['category'];

//database configuration
$database_name = 'firstcopy';
$database_user_name = 'admin';
$database_password = 'E1es57Y5dE4W';
$dbhost=$OPENSHIFT_MONGODB_DB_HOST;

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
 
//connecting to database

$databse=$connection->$database_name;

//connect to specific collection
$collection=$databse->product_info;


                                                                      //Registrering for footwears
if($category == "footwears")
{
	
	
  $product_name=($_POST['product_name']);
  $brand=($_POST['brand']);
  $gender=($_POST['gender']);
  $mrp=($_POST['mrp']);
  $ship_charge=($_POST['ship_charge']);
  $sizes=($_POST['sizes']);
  $cod=($_POST['cod']);
  $color=($_POST['color']);
  $condition=($_POST['condition']);
  $type=($_POST['type']);
  $specs=($_POST['specs']);
  echo "got paarams waiting for imGE";
  //$product_image=($_POST['img']);
  //echo $_POST['img'];
  //die();
  \Cloudinary\Uploader::upload("https://pbs.twimg.com/profile_images/641377009281536000/p_IIHGDf.jpg");
	

  //Save the product details

$user_data=array('product_name'=>$product_name,'brand'=>$brand,'gender'=>$gender,
'mrp'=>$mrp,'ship_charge'=>$ship_charge,'sizes'=>$sizes,'cod'=>$cod,'color'=>$color,
'condition'=>$condition,'specs'=>$specs,'seller'=>$seller);


$collection->save($user_data);
$response["success"] = 1;
        $response["message"] = "Shoes' Entry Registered";
		header('location:categories.html');
        die(json_encode($response));
}
else{
$response["success"] = 0;
        $response["message"] = "Error in registering Shoes";
        die(json_encode($response));
}	


                                                                                      // Registering for Watches
if($category == 'watches' )
{
  $product_name=($_POST['product_name']);
  $brand=($_POST['brand']);
  $gender=($_POST['gender']);
  $mrp=($_POST['mrp']);
  $ship_charge=($_POST['ship_charge']);
//  $sizes=($_POST['sizes']);
  $cod=($_POST['cod']);
  $dial_color=($_POST['dial_color']);
  $dial_shape=($_POST['dial_shape']);
  $type=($_POST['type']);
  $water_resistance=($_POST['wate r_resistance']);
  $series=($_POST['series']);
  $strap_color=($_POST['strap_color']);
  $condition=($_POST['condition']);
  $specs=($_POST['specs']);
  


  //Save the product details

$user_data=array('product_name'=>$product_name,'brand'=>$brand,'gender'=>$gender,
'$mrp'=>$mrp,'ship_charge'=>$ship_charge,'type'=>$type,'cod'=>$cod,'dail_color'=>$dail_color,
'dail_shape'=>$dail_shape,'water_resistance'=>$water_resistance,'series'=>$series,'strap_color'=>$strap_color,
'condition'=>$condition,'specs'=>$specs,'seller'=>$seller);


$collection->save($user_data);
$response["success"] = 1;
        $response["message"] = "$category Entry Registered";
        die(json_encode($response));
}
else{
$response["success"] = 0;
        $response["message"] = "Error in registering $category";
        die(json_encode($response));
}



                                                                                    // Registering for CLothings
if($category == 'clothings' )
{
  $product_name=($_POST['product_name']);
  $brand=($_POST['brand']);
  $gender=($_POST['gender']);
  $mrp=($_POST['mrp']);
  $ship_charge=($_POST['ship_charge']);
  $sizes=($_POST['sizes']);
  $cod=($_POST['cod']);
  $pcolor=($_POST['pcolor']);
  $scolor=($_POST['scolor']);
  $sleeve=($_POST['sleeve']);
  $fabric=($_POST['water_resistance']);
  $type=($_POST['type']);
  $fit=($_POST['fit']);
  $pattern=($_POST['pattern']);
  $occasion=($_POST['occasion']);
  $condition=($_POST['condition']);
  $specs=($_POST['specs']);


  //Save the product details

$user_data=array('product_name'=>$product_name,'brand'=>$brand,'gender'=>$gender,
'$mrp'=>$mrp,'ship_charge'=>$ship_charge,'type'=>$type,'cod'=>$cod,'sizes'=>$sizes,
'pcolor'=>$pcolor,'scolor'=>$scolor,'sleeve'=>$sleeve,'fabric'=>$fabric,
'fit'=>$fit,'pattern'=>$pattern,'occasion'=>$occasion,
'condition'=>$condition,'specs'=>$specs,'seller'=>$seller);


$collection->save($user_data);
$response["success"] = 1;
        $response["message"] = "$category Entry Registered";
        die(json_encode($response));
}
else{
$response["success"] = 0;
        $response["message"] = "Error in registering $category";
        die(json_encode($response));
}





                                                                                    // Registering for EyeWears
if($category == 'eyewears' )
{
$product_name=($_POST['product_name']);
  $brand=($_POST['brand']);
  $gender=($_POST['gender']);
  $mrp=($_POST['mrp']);
  $ship_charge=($_POST['ship_charge']);
  $size=($_POST['size']);
  $lens_shape=($_POST['lens_shape']);
  $cod=($_POST['cod']);
  $lens_color=($_POST['lens_color']);
  $frame_color=($_POST['frame_color']);
  $style=($_POST['style']);
  $usage=($_POST['usage']);
  $frame_material=($_POST['frame_material']);
  $condition=($_POST['condition']);
  $specs=($_POST['specs']);


  //Save the product details

$user_data=array('product_name'=>$product_name,'brand'=>$brand,'gender'=>$gender,
'mrp'=>$mrp,'ship_charge'=>$ship_charge,'lens_shape'=>$lens_shape,'cod'=>$cod,'sizes'=>$sizes,
'lens_color'=>$lens_color,'frame_color'=>$frame_color,'style'=>$style,'usage'=>$usage,
'frame_material'=>$frame_material,
'condition'=>$condition,'specs'=>$specs,'seller'=>$seller);


$collection->save($user_data);
$response["success"] = 1;
        $response["message"] = "$category Entry Registered";
        die(json_encode($response));
}
else{
$response["success"] = 0;
        $response["message"] = "Error in registering $category";
        die(json_encode($response));
}







                                                                                        //Registering for footwears
if($category == 'belts')
{
  $product_name=($_POST['product_name']);
$brand=($_POST['brand']);
$gender=($_POST['gender']);
$mrp=($_POST['mrp']);
$ship_charge=($_POST['ship_charge']);
$size=($_POST['size']);
$cod=($_POST['cod']);
$color=($_POST['color']);
$material=($_POST['material']);
$occasion=($_POST['occasion']);
$length=($_POST['length']);
$width=($POST['width']);

$condition=($_POST['condition']);
$specs=($_POST['specs']);


//Save the product details

$user_data=array('product_name'=>$product_name,'brand'=>$brand,'gender'=>$gender,
'$mrp'=>$mrp,'ship_charge'=>$ship_charge,'sizes'=>array('length'=>$length,'width'=>$width),'cod'=>$cod,'color'=>$col,
'condition'=>$condition,'specs'=>$specs,'occasion'=>$occasion,'material'=>$material,'seller'=>$seller);


$collection->save($user_data);
$response["success"] = 1;
$response["message"] =" $category Entry Registered";
die(json_encode($response));
}
else{
$response["success"] = 0;
$response["message"] = "Error in registering $category";
die(json_encode($response));
}



}else{
 die("Database are not connected");
}

?>
