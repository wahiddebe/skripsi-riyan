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

			if(isset($_GET["id"]) && isset($_GET["first_name"]) && isset($_GET["last_name"]))
			{
				if($_GET["id"] > 13)
				{
					$query = 'UPDATE `'.$tblname.'` SET 
					`first_name` = "'.$_GET["first_name"].'",
					`last_name` = "'.$_GET["last_name"].'" 
					WHERE `id` = '.$_GET["id"].'';
					$result = mysql_query($query);
					if($result)
						{
							$temp = array();
							$temp["first_name"] = $_GET["first_name"];
							$temp["last_name"] = $_GET["last_name"];
							array_push($response["result"],$temp);
							$response["message"]=1;
						}
					else
						$response["message"]=0;
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