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

			if(isset($_GET["id_user"]))
			{
        $cekData = 'SELECT id_transaksi from transaksi
                    WHERE id_pengguna="'.$_GET["id_user"].'"';
        $hasil = mysqli_query($con,$cekData);
        if(mysqli_num_rows($hasil)>0)
        {
          $query ='SELECT *
                FROM transaksi
                WHERE id_pengguna="'.$_GET["id_user"].'"
                AND flag=1';

                $result = mysqli_query($con,$query);

          			while ($row = mysqli_fetch_array($result))
          			{
          				$temp = array();
          				$temp["id_transaksi"] = $row["id_transaksi"];
          				$temp["tanggal_transaksi"] = $row["tanggal_transaksi"];
          				$temp["total_harga"] = $row["total_harga"];
									$temp["destinasi_kota"]= $row["destinasi_kota"];
									$temp["alamat"] = $row["alamat"];
									$temp["provinsi"] = $row["provinsi"];
									$temp["kodePos"] = $row["kodePos"];
									$temp["harga_delivery"] = $row["harga_delivery"];
          				$temp["status_pembayaran"] = $row["status_pembayaran"];
          				array_push($response["result"],$temp);
          			}
                $response["message"]=1;
        }
				else {
					$response["message"]=0;
				}
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
