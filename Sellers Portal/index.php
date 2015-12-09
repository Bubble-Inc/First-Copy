<?php

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if($actual_link=='http://seller.fcshop.in/')
  {
    header('Location:index1.html');
  }
	else
	{
		
		header('Location:index2.html');
	}
  
  /*
  if($actual_link=='http://www.fcshop.in/')
    {
      header('Location:index2.html');
    }
	 if($actual_link=='fcshop.in/')
    {
      header('Location:index2.html');
    }
*/

 ?>
