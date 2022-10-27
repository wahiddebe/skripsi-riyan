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

			if(isset($_GET["judul_buku"]) && isset($_GET["NO_ISBN"])
			&& isset($_GET["Pengarang"])&& isset($_GET["Harga"])
			&& isset($_GET["jumlah_halaman"]) && isset($_GET["tanggal_terbit"])
			&& isset($_GET["rating"]) && isset($_GET["deskripsi_buku"])
			&& isset($_GET["kode_kategori"]) && isset($_GET["gambar"])
			&& isset($_GET["berat_buku"]))
			{
				$query = 'INSERT INTO buku(judul_buku,NO_ISBN,Pengarang,Harga,
												jumlah_halaman,tanggal_terbit,rating,deskripsi_buku,kode_kategori,
											gambar,berat_buku)
				VALUES ("'.$_GET["judul_buku"].'","'.$_GET["NO_ISBN"].'",
							"'.$_GET["Pengarang"].'","'.$_GET["Harga"].'" ,
							"'.$_GET["jumlah_halaman"].'","'.$_GET["tanggal_terbit"].'",
							"'.$_GET["rating"].'","'.$_GET["deskripsi_buku"].'",
							"'.$_GET["kode_kategori"].'", "'.$_GET["gambar"].'","'.$_GET["berat_buku"].'")';
				$result = mysqli_query($con,$query);
				if($result)
					{
						$temp = array();
						$temp["id_buku"] = mysqli_insert_id($con);
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
