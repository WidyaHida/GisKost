<?php
//include "./include/conn.php";
//data dari lokasi
mysql_connect("localhost", "root", "");
mysql_select_db("gis_kost");


$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$harga = $_POST['harga'];
$jarak = $_POST['jarak'];
$nohp = $_POST['nohp'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];

$aDoor = $_POST['formDoor'];
//print_r($lon); die();
$sql = "INSERT INTO kost(id_kost,nama, latitude, lon, nohp, alamat, harga, jarak) VALUES
	('','$nama', '$lat', '$lon', '$nohp', '$alamat', '$harga', '$jarak')";
	



$result = mysql_query($sql) or die(mysql_error());




$nama = $_POST['nama'];
$aa = "SELECT id_kost from kost where nama = '$nama'";
$aaa = mysql_query($aa);
$aaaa= mysql_fetch_array($aaa);
$ab = $aaaa['id_kost'];
//print_r($ab); die();
//default /tahun
$q = "insert into ko_jang (id_ko_jang,id_kost, id_jangka) VALUES ('','$ab', 2) ";
$qq = mysql_query($q);

$q = "insert into kost_jar (id_kost_jar,id_kost, id_satuanjar) VALUES ('','$ab', 1) ";
$qq = mysql_query($q);

$N = count($aDoor);
for($i=0; $i < $N; $i++)
  {
 
$o = "insert into kost_fas (id_kost_fas,id_kost, id_fas) VALUES ('','$ab', '$aDoor[$i]') ";
$oo = mysql_query($o);
}


//check if query successful
if($result) {
	header('location:peta.php');
} else {
	header('location:tambah.php');
}
mysql_close();
?>
