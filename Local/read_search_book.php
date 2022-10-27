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
			$query = 'SELECT * FROM `'.$tblname.'` WHERE 1';
			$querytemp = '';

			if(isset($_GET["data_cari"]))
			{
				$querytemp.= ' and (`judul_buku` like "%'.$_GET["data_cari"].'%" or `Pengarang` like "%'.$_GET["data_cari"].'%" ) ';
			}

			$query.=$querytemp;//.' order by `tanggal_terbit` LIMIT 5';
			$result = mysqli_query($con,$query);

			while ($row = mysqli_fetch_array($result))
			{
				$temp = array();
				$temp["id_buku"] = $row["id"];
				$temp["judul_buku"] = $row["judul_Buku"];
				$temp["pengarang"] = $row["Pengarang"];
				$temp["harga"] = $row["Harga"];
				$temp["tgl_terbit"] = $row["tanggal_terbit"];
				$temp["No_ISBN"] = $row["No_ISBN"];
				$temp["jumlah_halaman"] = $row["jumlah_halaman"];
				$temp["rating"] = $row["rating"];
				$temp["gambar"] = $row["gambar"];
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
