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

			if(isset($_GET["id_user"]) && isset($_GET["id_buku"]) && isset($_GET["judul_buku"]) && isset($_GET["pengarang"]) && isset($_GET["harga"]) && isset($_GET["rating"]) && isset($_GET["gambar"]))
			{
        $cekData = 'SELECT id_wishlist from wishlist
                    WHERE id_user="'.$_GET["id_user"].'"';
        $hasil = mysqli_query($con,$cekData);
        if ($hasil) {
            //echo 'berhasil cek 1';
          $id_wish = mysqli_fetch_array($hasil)["id_wishlist"];
          $cekDetil = 'SELECT id_buku,id_detil_wishlist from detil_wishlist
                      WHERE id_buku="'.$_GET["id_buku"].'"
                      and id_wishlist="'.$id_wish.'"';
          $hasil1 = mysqli_query($con,$cekDetil);
          if (mysqli_num_rows($hasil1)==0)
          {
              //echo 'berhasil cek 2';
            $query = 'INSERT INTO detil_wishlist(id_wishlist,id_buku,judul_buku,pengarang,harga,rating,gambar,jumlah)
            VALUES ('.$id_wish.','.$_GET["id_buku"].',"'.$_GET["judul_buku"].'","'.$_GET["pengarang"].'",'.$_GET["harga"].','.$_GET["rating"].',"'.$_GET["gambar"].'",1)';
              //echo $query;
            $result = mysqli_query($con,$query);
            if($result)
              {
                $temp = array();
                $temp["id_wish"] = $id_wish;
                array_push($response["result"],$temp);
                $response["message"]=1;

              }
            else
              $response["message"]=0;
          }
          else {
            $id_detil = mysqli_fetch_array($hasil1)["id_detil_wishlist"];
            $query1 = 'UPDATE detil_wishlist
                      SET jumlah=jumlah+1
                      WHERE id_buku="'.$_GET["id_buku"].'"
                       AND id_detil_wishlist="'.$id_detil.'"';
            $result = mysqli_query($con,$query1);
            if($result)
              {
                $temp = array();
                $temp["id_detil"] = $id_detil;
                array_push($response["result"],$temp);
                $response["message"]=1;

              }
            else
              $response["message"]=0;
          }
        }
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
