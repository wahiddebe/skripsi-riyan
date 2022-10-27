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

			$querysel = 'SELECT * FROM user_aplikasi WHERE 1';
			$query = '';

			if(isset($_GET["username"]))
			{
				$query.= ' and `email` = "'.$_GET["username"].'" ';
			}
			if(isset($_GET["password"]))
			{
				$query.= ' and `password` = "'.$_GET["password"].'" ';
			}


			$querysel.=$query;
			$result = mysqli_query($con,$querysel);

			while ($row = mysqli_fetch_array($result))
			{
				$temp = array();
				$temp["id_user"] = $row["id_user"];
				$temp["nama_user"] = $row["nama_user"];
				$temp["email"] = $row["email"];
				array_push($response["result"],$temp);
			}

			$response["message"]=1;
		}
	}
	catch(Exception $e)
	{
		$response["message"]=0;
	}

	$response = json_encode($response);
	echo $response;

?>
