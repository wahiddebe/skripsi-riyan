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

			if(isset($_GET["id"]))
			{
				if($_GET["id"] > 13)
				{
					$query = 'DELETE FROM `'.$tblname.'` WHERE `id` = '.$_GET["id"].'';
					$result = mysql_query($query);
					if(mysql_affected_rows())
						$response["message"]=1;
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