<?php

	$configs = include('config.php');

	//echo $configs['user'];

	$dbhost = $configs['host'];
	$dbuser	= $configs['user'];
	$dbpass	= $configs['pass'];
	$dbname	= $configs['dbname'];

	$response = array();
	$response["result"] = array();

	try
	{
		$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
		{

			if(isset($_GET["id_transaksi"]) && isset($_GET["id_wishlist"]) && isset($_GET["id_buku"]) && isset($_GET["judul_buku"]) &&
			isset($_GET["jumlah"]) && isset($_GET["harga_total"]))
			{
				$query = 'INSERT INTO detil_transaksi(id_transaksi,id_buku,judul_buku,jumlah,harga_total)
				VALUES ("'.$_GET["id_transaksi"].'",
                "'.$_GET["id_buku"].'","'.$_GET["judul_buku"].'",
					      "'.$_GET["jumlah"].'","'.$_GET["harga_total"].'")';
				$result = mysqli_query($con,$query);
				if($result)
					{
                        $query2 = 'delete from detil_wishlist where id_wishlist="'.$_GET["id_wishlist"].'"';
                        $result2 = mysqli_query($con,$query2);
						$temp = array();
						$temp["id_detil"] = mysqli_insert_id($con);
            $temp["id_buku"] = $GET["id_buku"];
            $temp["id_transaksi"] = $GET["id_transaksi"];
            $temp["jumlah"] = $GET["jumlah"];
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
