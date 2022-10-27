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

			if(isset($_GET["kode_pembayaran"])&&isset($_GET["id_transaksi"]))
			{
				$query = 'UPDATE transaksi
									set kode_pembayaran = "'.$_GET["kode_pembayaran"].'"
									where id_transaksi="'.$_GET["id_transaksi"].'" ';
				$result = mysqli_query($con,$query);
				if($result)
					{
						//$temp = array();
						//$temp["email"] = $_GET["email"];
						//array_push($response["result"],$temp);
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
