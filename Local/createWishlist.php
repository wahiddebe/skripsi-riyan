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

			if(isset($_GET["email"]))
			{
				$query = 'INSERT INTO wishlist(id_user,total_harga)
				VALUES ((Select user_aplikasi.id_user
						from user_aplikasi
						where email="'.$_GET["email"].'"),0 )';
				$result = mysqli_query($con,$query);
				if($result)
					{
						$temp = array();
						$temp["email"] = $_GET["email"];
						array_push($response["result"],$temp);
						$response["message"]=1;

					}
				else
					$response["message"]=0;
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
