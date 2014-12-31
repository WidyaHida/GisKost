<?php include "./include/conn.php";
	
		
	?>
		<html>
	<head>
		<title>GIS KOST</title>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<style type="text/css">
		<!--
		.style1 {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		}
		-->
		</style>
		<style type='text/css'>
#peta {
width: 100%;
height: 340px;
 
} </style>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
 
(function() {
window.onload = function() {
var map;
var locations = [
<?php
//konfgurasi koneksi database

mysql_connect('localhost','root','');
mysql_select_db('gis_kost');

 
$bagianWhere = "";
$query = "";
 
if (isset($_POST['jarakCat']))
{
$jarak1 = $_POST['jarak1'];
$jarak2 = $_POST['jarak2'];



if (empty($bagianWhere))
{
$bagianWhere .= "jarak BETWEEN '$jarak1' AND '$jarak2'";
}
else
{
$bagianWhere .= " AND jarak BETWEEN '$jarak1' AND '$jarak2'";
}
}
 

if (isset($_POST['hargaCat']))
{
$harga1 = $_POST['harga1'];
$harga2 = $_POST['harga2'];

if (empty($bagianWhere))
{
$bagianWhere .= "harga BETWEEN '$harga1' AND '$harga2'";
}
else
{
$bagianWhere .= " AND harga BETWEEN '$harga1' AND '$harga2'";
}
}

if (isset($_POST['fasCat']))
{
$fas = $_POST['fas'];
if (empty($bagianWhere))
{
$bagianWhere .= "bb.id_fas = '$fas' AND bb.id_kost = cc.id_kost";
}
else
{
$bagianWhere .= " JOIN ";
}
}

if(isset($_POST['hargaCat'])&&isset($_POST['jarakCat'])&&isset($_POST['fasCat'])){
$fas = $_POST['fas'];
$jarak1 = $_POST['jarak1'];
$jarak2 = $_POST['jarak2'];
$harga1 = $_POST['harga1'];
$harga2 = $_POST['harga2'];
$query = "SELECT * from kost as aa, kost_fas as bb where jarak BETWEEN '$jarak1' AND '$jarak2' AND harga BETWEEN '$harga1' AND '$harga2' AND bb.id_fas = '$fas' AND bb.id_kost = aa.id_kost";
}

else if(isset($_POST['hargaCat'])&&isset($_POST['fasCat'])){
$fas = $_POST['fas'];
$harga1 = $_POST['harga1'];
$harga2 = $_POST['harga2'];
$query = "SELECT * from kost as aa, kost_fas as bb where harga BETWEEN '$harga1' AND '$harga2' AND bb.id_fas = '$fas' AND bb.id_kost = aa.id_kost";
}

else if(isset($_POST['jarakCat'])&&isset($_POST['fasCat'])){
$fas = $_POST['fas'];
$jarak1 = $_POST['jarak1'];
$jarak2 = $_POST['jarak2'];

$query = "SELECT * from kost as aa, kost_fas as bb where jarak BETWEEN '$jarak1' AND '$jarak2' AND bb.id_fas = '$fas' AND bb.id_kost = aa.id_kost";
}

else if(isset($_POST['hargaCat'])| isset($_POST['jarakCat'])){
$query = "SELECT * FROM kost WHERE ".$bagianWhere;

}
else if(isset($_POST['fasCat'])){
$query = "SELECT * FROM kost_fas as bb ,kost as cc WHERE  ". $bagianWhere;
}



//$sql_lokasi="select * from kost where";
$result=mysql_query($query);
// ambil nama,lat dan lon dari table lokasi dengan menggunakan mysql_fetch_object, sesuaikan file nya yg ditabel.
while($data=mysql_fetch_object($result)){
?>
['<?=$data->nama?>', '<?=$data->alamat;?>', '<?=$data->latitude;?>', '<?=$data->lon;?>'],

<?php
}
?>
 
];
 
//Parameter Google maps
var options = {
zoom: 15, //level zoomin peta
//posisi tengah peta, Kab. Pidie
center: new google.maps.LatLng(-7.560738, 110.856703),
mapTypeId: google.maps.MapTypeId.ROADMAP
};
 
// Buat peta di
var map = new google.maps.Map(document.getElementById('peta'), options);
// Tambahkan Marker
 
var infowindow = new google.maps.InfoWindow();
 
var marker, i;
/* kode untuk menampilkan banyak marker */
for (i = 0; i < locations.length; i++) {
marker = new google.maps.Marker({
position: new google.maps.LatLng(locations[i][2], locations[i][3]),
map: map,
icon: 'marker.png'
});


/* menambahkan event clik untuk menampikan
infowindows dengan isi sesuai denga
marker yang di klik */
google.maps.event.addListener(marker, 'click', (function(marker, i) {
return function() {
var a = 'Nama Kos : '+locations[i][0]+'<br>Alamat : '+locations[i][1];

 var infowindow = new google.maps.InfoWindow({
      content: a,
      maxWidth: 2000
  });
//infowindow.setContent(locations[i][0]);
infowindow.open(map, marker);
}
})(marker, i));
}
 
};
})();
 
</script>
	</head>
	<body background="./img/sky.jpg">
	<p>&nbsp;</p>
		<table border="0" align="center" bgcolor="#FFFFFF">
		<tr>
			<td width="210">
			
			
			
			<table width="189" height="247" border="0" align="center">
			<tr>
				<td width="103" align="center" valign="top"><?php?></td>
			</tr>
			<tr>
				<td height="63" align="center"><?php include "menu.php"; ?></td>
			</tr>
			<tr>
				<td height="50" align="center">
				
	<table width="28%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center">
	<tr> 
		<td width="22%" align="right"><img src="./img/kiri.jpg"></td>
		<td width="70%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">Peta Kost</font></strong></div></td>
		<td width="6%"><img src="./img/kanan.jpg"></td>
	</tr>
	<tr>
		<td background="./img/b-kiri.jpg">&nbsp; </td>
		<td>
		<table width="700" align="center">
			<tr><td width="680">
			
			
	
			</p>
			<p align="center"><font face="verdana" size="2"><?
		
		
			
			$page=(int)$_GET['id'];
			$offset=$page*$gis;
			?>
				  
		
			
					
			</td></tr>
		</table>
		<form action="peta1.php" method="post">
			<table id="myTable" align="center">
			<tr>
			<td width="202" align="right">
			
				<tr><td><input type ="checkbox" name="hargaCat">Harga</td><td><input type="text" name="harga1" placeholder="harga"></td><td><font size="2px">sampai</font></td><td><input type="text" name="harga2" placeholder="harga"></td><td><font size="1px">ex: 2000000</font></td></tr>
					<tr><td><input type ="checkbox" name="jarakCat">Jarak</td><td><input type="text" name="jarak1" placeholder ="jarak dalam meter"></td><td><font size="2px">sampai</font></td><td><input type="text" name="jarak2" placeholder="jarak dalam meter"></td></tr>
				<tr><td><input type ="checkbox" name="fasCat">Fasilitas</td><td  colspan="4"><input type="radio" name="fas" value="1"> Lemari 
				<input type="radio" name="fas" value="4">AC
				<input type="radio" name="fas" value="2"> Kamar Mandi Luar
				<input type="radio" name="fas" value="5"> Kamar Mandi Dalam
				<input type="radio" name="fas" value="3"> Wifi</td></tr>
				
				<?}
				?>
				</select>
			</td>
			<td width="1">&nbsp;</td>
			
			<td width="170"><input type="submit"  name="cari" value="CARI" /></td>
			</tr>
			</table>
			</form>
		<div id="peta"></div>
		</td>
		<td background="./img/b-kanan.jpg">&nbsp;</td>
		<td width="2%"></td>
	</tr>
	<tr> 
		<td align="right"><img src="./img/kib.jpg"></td>
		<td bgcolor="#5686c6" ><div align="center"><strong><font color="#FFFFFF"><font face="verdana" size="3"><font face="verdana" size="2"> <b><? echo $jumlah; ?></b></font></font></div></td>
		<td><img src="./img/kab.jpg"></td>
	</tr>
	</table>
		
    <p>
      <?
}
?>
</p>
    <p>&nbsp;        </p>

				</td>
			</tr>
			<tr>
				<td bgcolor ="#9191FE" align="center" size="7px"><?php echo "@copyright Group 2 GIS informatika UNS - 2014" ?></td>
			</tr>
			</table>
			
			
			
			
		  </td>
		</tr>
		</table>
	    <p>&nbsp;</p>
	</body>
	</html>
	
	
	