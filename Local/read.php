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
		mysql_connect($dbhost,$dbuser,$dbpass);
		mysql_select_db($dbname);

		{

			$querysel = 'SELECT * FROM `'.$tblname.'` WHERE 1';
			$query = '';

			if(isset($_GET["kategori"]))
			{
				$query.= ' and `Kategori` = "'.$_GET["kategori"].'" ';
			}


			$querysel.=$query;
			$result = mysql_query($querysel);

			while ($row = mysql_fetch_array($result))
			{
				$temp = array();
				$temp["id"] = $row["id"];
				$temp["nama_tempat"] = $row["nama_tempat"];
				$temp["gambar"] = $row["gambar"];
				$temp["lokasi"] = $row["lokasi"];
				$temp["rating"] = $row["Rating"];
				$temp["latitude"] = $row["Latitude"];
				$temp["longitude"] = $row["Longitude"];
				//$temp["last_name"] = $row["last_name"];
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