<?php
mysql_connect("localhost", "root", "");
mysql_select_db("gis_kost");

$query = "SELECT * FROM kost"; 
$hasil = mysql_query($query);
$row=mysql_fetch_array($hasil); 


	?>
		<html>
	<head>
		<title>GIS KOST</title>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<!-- DataTables CSS -->
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
  
			<!-- jQuery -->
		<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  		<!-- DataTables -->
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>

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
			
			
	
			</p>
			<p align="center"><font face="verdana" size="2">
			<?php
			$query = "SELECT * FROM kost"; 
			$hasil = mysql_query($query);
			
			
		
			
				
			?></div>
			  </font></p>
			  
			
			
			<form action="process.php" method="post">
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
			
			
			
			
			
			
			
			<?php
			//print_r($row); die();
			if (!empty($hasil)){
				?>

					<table  id="myTable" style="border:2px solid black"  width="645" border="0" align="center">
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
					
					while($row=mysql_fetch_array($hasil)){
												
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
			else{
			?>
			  <p align="center"><font color="#FF0000" face="verdana" size="2"><b>Tidak ada data!!</b></font></p>
					<?php
				}
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
	
<script type="text/javascript">
	$(document).ready(function(){
    $('#myTable').DataTable();
});

</script>

