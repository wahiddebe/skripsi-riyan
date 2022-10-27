<?php

	$configs = include('config.php');

	//echo $configs['user'];

	$dbhost = $configs['host'];
	$dbuser	= $configs['user'];
	$dbpass	= $configs['pass'];
	$dbname	= $configs['dbname'];

	$response = array();
	$response["KomentarBuku"] = array();

	try
	{
		$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

		{

			$querysel = 'SELECT nama_user,isi_review,rating_review,tanggal_review FROM review
		inner join user_aplikasi using(id_user) WHERE 1';
			$query = '';

			if(isset($_GET["id_buku"]))
			{
				$query.= ' and `id_buku` = "'.$_GET["id_buku"].'" ';
			}


			$querysel.=$query;
			$result = mysqli_query($con,$querysel);

			while ($row = mysqli_fetch_array($result))
			{
				$temp = array();
				$temp["nama_user"] = $row["nama_user"];
				$temp["isi_review"] = $row["isi_review"];
				$temp["rating_review"] = $row["rating_review"];
				$temp["tanggal_review"] = $row["tanggal_review"];
				//$temp["last_name"] = $row["last_name"];
				array_push($response["KomentarBuku"],$temp);
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
