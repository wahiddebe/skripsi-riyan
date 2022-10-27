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
        $cekData = 'SELECT id_wishlist from wishlist
                    WHERE id_user="'.$_GET["id_user"].'"';
        $hasil = mysqli_query($con,$cekData);
        if(mysqli_num_rows($hasil)>0)
        {
          $id_wish = mysqli_fetch_array($hasil)["id_wishlist"];
          $query ='SELECT detil_wishlist.judul_buku,detil_wishlist.pengarang,detil_wishlist.harga,detil_wishlist.rating,detil_wishlist.gambar,detil_wishlist.jumlah
                FROM wishlist INNER join detil_wishlist
                on wishlist.id_wishlist=detil_wishlist.id_wishlist
                WHERE wishlist.id_user="'.$_GET["id_user"].'"';

                $result = mysqli_query($con,$query);
            $response["id_wishlist"]=$id_wish;
          			while ($row = mysqli_fetch_array($result))
          			{
          				$temp = array();
          				$temp["id_buku"] = $row["id"];
          				$temp["judul_buku"] = $row["judul_buku"];
          				$temp["pengarang"] = $row["pengarang"];
          				$temp["harga"] = $row["harga"];
          				$temp["rating"] = $row["rating"];
          				$temp["gambar"] = $row["gambar"];
                  $temp["jumlah"] = $row["jumlah"];
          				array_push($response["result"],$temp);
          			}
                $response["message"]=1;
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
