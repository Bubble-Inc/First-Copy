<?php
setcookie("email",$_SESSION['email'], time()+3600*24);
header('Location: categories.html');	
?>
