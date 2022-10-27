<?php

	$configs = include('config.php');

	//echo $configs['user'];

	$dbhost = $configs['host'];
	$dbuser	= $configs['user'];
	$dbpass	= $configs['pass'];
	$dbname	= $configs['dbname'];
	$tblname = $configs['tblname'];

	$response = array();
	$response["result"] = array();

	try
	{
		$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
		{
			
			if(isset($_GET["email"]) && isset($_GET["password"])
			&& isset($_GET["nama_user"])&& isset($_GET["tanggal_lahir"]))
			{
				$query = 'INSERT INTO user_aplikasi(email,nama_user,tanggal_lahir,password) 
				VALUES ("'.$_GET["email"].'","'.$_GET["nama_user"].'",
					"'.$_GET["tanggal_lahir"].'","'.$_GET["password"].'" )';
					
				$result = mysqli_query($con,$query);
				if($result)
					{
						$temp = array();
						$temp["email"] = $_GET["email"];
						$temp["password"] = $_GET["password"];
						array_push($response["result"],$temp);
						$response["message"]=1;
						
					}
				else
				{
					$response["message"]=0;
				}
					
			}
			else
					$response["message"]=0;
		}
	}
	catch(Exception $e)
	{
		$response["message"]=0;
	}

	$response = json_encode($response);
	echo $response;

?>