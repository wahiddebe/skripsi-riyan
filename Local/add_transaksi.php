<?php

	$configs = include('config.php');

	//echo $configs['user'];

	$dbhost = $configs['host'];
	$dbuser	= $configs['user'];
	$dbpass	= $configs['pass'];
	$dbname	= $configs['dbname'];
	date_default_timezone_set("Asia/Bangkok");

	$response = array();
	$response["result"] = array();

	try
	{
		$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
		{

			if(isset($_GET["id_pengguna"]) &&  isset($_GET["destinasi_kota"]) &&
			isset($_GET["alamat"]) && isset($_GET["kodePos"]) && isset($_GET["provinsi"]) &&
      isset($_GET["total_harga"])&&isset($_GET["harga_delivery"]))
			{
				$tanggal = date("d-m-Y h:i:sa");
				$query = 'INSERT INTO transaksi(id_pengguna,tanggal_transaksi,destinasi_kota,alamat,provinsi,kodePos,total_harga,harga_delivery,status_pembayaran,flag)
				VALUES ("'.$_GET["id_pengguna"].'", "'.$tanggal.'",
           "'.$_GET["destinasi_kota"].'", "'.$_GET["alamat"].'", "'.$_GET["provinsi"].'",
					"'.$_GET["kodePos"].'", "'.$_GET["total_harga"].'","'.$_GET["harga_delivery"].'","belum bayar",1 )';
				$result = mysqli_query($con,$query);
				if($result)
					{
						$temp = array();
						$temp["id_transaksi"] = mysqli_insert_id($con);
						$temp["tanggal"] = $tanggal;
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
