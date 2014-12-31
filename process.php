<?php
 
mysql_connect("localhost", "root", "");
mysql_select_db("gis_kost");
 
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

// if(isset($_POST['fasCat'])){
// $query = $fasi;
// //print_r($aa); die();
// }

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


$aa = mysql_query($query);




echo "<table border='1'>";

?>
			



<!-- untuk tampilannya -->

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
		<td width="70%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">Cari Kost</font></strong></div></td>
		<td width="6%"><img src="./img/kanan.jpg"></td>
	</tr>
	<tr>
		<td background="./img/b-kiri.jpg">&nbsp; </td>
		<td>
		<table width="322" align="center">
			<tr><td width="314">
			
	
						
			<form action="process.php" method="post">
			<table align="center">
			<tr>
			<td width="202" align="right">
			
				<tr><td><input type ="checkbox" name="hargaCat">Harga</td><td><input type="text" name="harga1" placeholder="harga"></td><td><font size="2px">sampai</font></td><td><input type="text" name="harga2" placeholder="harga"></td><td><font size="1px">ex: 2000000</font></td></tr>
				<tr><td><input type ="checkbox" name="jarakCat">Jarak</td><td><input type="text" name="jarak1" placeholder ="jarak dalam meter"></td><td><font size="2px">sampai</font></td><td><input type="text" name="jarak2" placeholder="jarak dalam meter"></td></tr>
				<tr><td><input type ="checkbox" name="fasCat">Fasilitas</td>
				<td  colspan="4">
				<input type="radio" name="fas" value="1"> Lemari 				
				<input type="radio" name="fas" value="2"> Kamar Mandi luar
				<input type="radio" name="fas" value="3"> Wifi
				<input type="radio" name="fas" value="4"> AC
				<input type="radio" name="fas" value="5"> Kamar Mandi Dalam
				</td></tr>
				
				<?}
				?>
				</select>

			</td>
			<td width="1">&nbsp;</td>
			
			<td width="170"><input type="submit"  name="cari" value="CARI" /></td>
			</tr>
			</table>
			</form>
			
			
			
			<?php
			//print_r($row); die();
			if (!empty($aa)){
				?>

					<table  style="border:2px solid black"  width="645" border="0" align="center">
					<tr >
						<!-- <th style="border:2px solid black" width="55" bgcolor="#333333"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">No.</font></th> -->
						<th style="border:2px solid black" width="55" bgcolor="#333333"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Nama Kost</font></th>
						<th style="border:2px solid black" width="54" bgcolor="#333333"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Alamat</font></th>
						<th style="border:2px solid black" width="87" bgcolor="#333333"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Harga</font></th>
						<th style="border:2px solid black" width="78" bgcolor="#333333"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Fasilitas</font></th>
						<th style="border:2px solid black" width="78" bgcolor="#333333"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Jarak dari Kost-Kampus</font></th>
						<th style="border:2px solid black" width="78" bgcolor="#333333"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">No.telp</font></th>
				

					</tr>
					<?php
					
					while($row=mysql_fetch_array($aa)){
										
						?>
						<tr>
						 <!-- <td style="border:2px solid black" align="center"><font  face="verdana" size="2"><?php echo $row[0]; ?></font></td> -->
						  <td style="border:2px solid black" align="center"><font  face="verdana" size="2"><?php echo $row['nama']; ?></font></td>
						  <td style="border:2px solid black" align="center"><font face="verdana" size="2"><?php echo $row['alamat']; ?></font></td>
						  <td style="border:2px solid black" align="center"><font face="verdana" size="2"><?php echo $row['harga']; ?>
						  <?php
  							$oo ="SELECT * FROM jangka_waktu as aa, ko_jang as bb WHERE bb.id_kost='".$row['id_kost']."' AND bb.id_jangka = aa.id_jangka";
  							$query1 = mysql_query($oo);
						    $roo = mysql_fetch_array($query1);
						    echo $roo['nama_jangka'];
						   ?>
						   </font></td>

						    <td style="border:2px solid black" align="center"><font face="verdana" size="2">
						    <?php 
						    	$fas="SELECT * FROM fasilitas as aa, kost_fas as bb WHERE bb.id_kost='".$row['id_kost']."' AND bb.id_fas = aa.id_fas";
						    	$query111= mysql_query($fas);
						       	while ($fas1 = mysql_fetch_array($query111)) {
						    		echo $fas1['nama_fas'].'<br>';
						    	}
						    	
						    	?>
						    </font></td>

						     <td style="border:2px solid black" align="center"><font face="verdana" size="2"><?php echo $row['jarak']; ?>
 						<?php
  						
  							$oo1 ="SELECT * FROM satuanjar as aa, kost_jar as bb WHERE bb.id_kost='".$row['id_kost']."' AND bb.id_satuanjar = aa.id_satuanjar";
  							$query11 = mysql_query($oo1);
						   $roo1 = mysql_fetch_array($query11);
						   echo $roo1['nama'];
						   ?>
						     </font></td>
						    
						      <td style="border:2px solid black" align="center"><font face="verdana" size="2"><?php echo $row['nohp']; ?></font></td>
						</tr>
					<?php }
					?>
					</table>
				
			<?php }
			else if (empty($aa)) {?>
				  <p align="center"><font color="#FF0000" face="verdana" size="2"><b>Tidak ada data!!</b></font></p>
			<?php } 
			?>
			
					
			</td></tr>
		</table>
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
	
	
