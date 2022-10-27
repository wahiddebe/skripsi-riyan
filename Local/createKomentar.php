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

			if(isset($_GET["id_buku"]) && isset($_GET["id_user"]) && isset($_GET["isi_review"])&&isset($_GET["rating_review"])
			&&isset($_GET["tanggal_review"]))
			{
				$query = 'INSERT INTO review(id_buku,id_user,isi_review,rating_review,tanggal_review)
				VALUES ("'.$_GET["id_buku"].'","'.$_GET["id_user"].'","'.$_GET["isi_review"].'"
				,"'.$_GET["rating_review"].'","'.$_GET["tanggal_review"].'" )';
				$result = mysqli_query($con,$query);
				if($result)
					{
						$temp = array();
						$temp["id_buku"] = $_GET["id_buku"];
						$temp["id_user"] = $_GET["id_user"];
						$temp["komentar"] = $_GET["isi_review"];
						$temp["rating"] = $_GET["rating_review"];
						$temp["tanggal"] = $_GET["tanggal_review"];
						array_push($response["KomentarBuku"],$temp);
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
