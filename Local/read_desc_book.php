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
			$query = 'SELECT deskripsi_buku FROM buku WHERE 1';
			$querytemp = '';

			if(isset($_GET["id_buku"]))
			{
				$querytemp.= ' and `id` = "'.$_GET["id_buku"].'"   ';
			}

			$query.=$querytemp;
			$result = mysqli_query($con,$query);

			while ($row = mysqli_fetch_array($result))
			{
				$temp = array();
				$temp["deskripsi_buku"] = $row["deskripsi_buku"];
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
