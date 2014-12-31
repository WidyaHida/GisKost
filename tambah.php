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
		<script
src="http://maps.googleapis.com/maps/api/js">
</script>


	</head>
	<body background="img/sky.jpg">
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
		<td width="70%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">Cari Kost</font></strong></div></td>
		<td width="6%"><img src="./img/kanan.jpg"></td>
	</tr>
	<tr>
		<td background="./img/b-kiri.jpg">&nbsp; </td>
		<td>
		<table width="600" align="center">
			<!-- ini form input -->
			
		</table>
		<form   method="POST" id="form1" action="proses_tambah.php">
		<div id="map" style="width:650px;height:380px;"></div>
		<table><tr><td>Nama Kost</td><td>:</td><td><input type="text" name='nama' id='nama'></td></tr>
		<tr><td>Alamat</td><td>:</td><td><input type="text" name='alamat' id='alamat'></td></tr>
		<tr><td>No. HP</td><td>:</td><td><input type="number" name='nohp' id='nohp'></td></tr>
		<tr><td>Harga</td><td>:</td><td><input type="number" name='harga' id='harga'></td></tr>
		<tr><td>Jarak</td><td>:</td><td><input type="number" name='jarak' id='jarak'></td></tr>
		<tr><td>Latitude</td><td>:</td><td><input type="text" name='lat' id='latitude'></td></tr>
		<tr><td>Longitude</td><td>:</td><td><input type="text" name='lon' id='longitude' ></td></tr>
		<tr><td>Fasilitas</td><td>:</td><td><input type="checkbox" name="formDoor[]" value="1" />Lemari<br />
			<input type="checkbox" name="formDoor[]" value="4" />AC<br />
			<input type="checkbox" name="formDoor[]" value="2" />Kamar Mandi Luar<br />
			<input type="checkbox" name="formDoor[]" value="5" />Kamar Mandi Dalam<br />
			<input type="checkbox" name="formDoor[]" value="6" />Meja<br />
			<input type="checkbox" name="formDoor[]" value="7" />Kursi<br />
			<input type="checkbox" name="formDoor[]" value="8" />Ranjang Tempat Tidur<br />
			<input type="checkbox" name="formDoor[]" value="9" />Kasur<br />
			<input type="checkbox" name="formDoor[]" value="3" />Wifi</td></tr></table>
		<button type="submit" name='tambah'>Tambah</button></form>
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
		
		  <script type="text/javascript">
		//* Fungsi untuk mendapatkan nilai latitude longitude
		function updateMarkerPosition(latLng) {
				document.getElementById('latitude').value = [latLng.lat()]
				document.getElementById('longitude').value = [latLng.lng()]
			}
			
var map = new google.maps.Map(document.getElementById('map'), {
zoom: 15,
center: new google.maps.LatLng(-7.560738, 110.856703),
 mapTypeId: google.maps.MapTypeId.ROADMAP
	});
	
var latLng = new google.maps.LatLng(-7.560738, 110.856703);

/* buat marker yang bisa di drag lalu 
  panggil fungsi updateMarkerPosition(latLng)
 dan letakan posisi terakhir di id=latitude dan id=longitude
 */
var marker = new google.maps.Marker({
		position : latLng,
		title : 'lokasi',
		map : map,
		draggable : true
	});
	
updateMarkerPosition(latLng);
google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerPosition(marker.getPosition());
  });
</script>
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
	
	
	