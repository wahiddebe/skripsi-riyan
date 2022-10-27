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


			if(isset($_GET["id_transaksi"]))
			{
				$query ='SELECT judul_buku, jumlah, harga_total
				FROM transaksi
				INNER JOIN detil_transaksi ON transaksi.id_transaksi = detil_transaksi.id_transaksi
                WHERE detil_transaksi.id_transaksi = "'.$_GET["id_transaksi"].'"';

                $result = mysqli_query($con,$query);

          			while ($row = mysqli_fetch_array($result))
          			{
          				$temp = array();
          				//$temp["id_buku"] = $row["id"];
          				$temp["judul_buku"] = $row["judul_buku"];
          				//$temp["pengarang"] = $row["pengarang"];
          				$temp["harga"] = $row["harga_total"];
          				//$temp["rating"] = $row["rating"];
          				//$temp["gambar"] = $row["gambar"];
						$temp["jumlah"] = $row["jumlah"];
          				array_push($response["result"],$temp);
          			}
                $response["message"]=1;
			}
		}
	}
	catch(Exception $e)
	{
		$response["message"]=0;
	}

	$response = json_encode($response);
	echo $response;

?>
