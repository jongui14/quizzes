<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Credits</title>
		<link rel='stylesheet' type='text/css' href='../stylesPWS/style.css' />
		<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='../stylesPWS/wide.css' />
		<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='../stylesPWS/smartphone.css' />
	</head>
	<style>
		table, td, th {    
			border: 2px solid #ddd;
			text-align: left;
		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			padding: 15px;
		}
		#atzeraArgazkia{
			position: relative;
			top: -600px;
			left: -300px;
		}
	</style>
	<body>
	<center>
		<h1> Credits </h1>
		<br><br>
		<p> Hona hemen web orrialde honen sortzaileen informazioa: </p>
		<br><br>
		<table>
			<tr>
				<th>Izen-abizenak</th>
				<th>Argazkia</th>
				<th>Espezialitatea</th>
				<th>Jaioterria</th>
				<th>Helbide elektronikoa</th>
			</tr>
			<tr>
				<td>Jon Guilló Rodriguez</td>
				<td> <img src="../img/1.jpg" id="jon_arg" alt="Jon face" height="50" width="50">  </td>
				<td>Software</td>
				<td> Elgoibar </td>
				<td> jguillo001@ikasle.ehu.eus </td>
			</tr>
			<tr>
				<td>Ander Madinabeitia Araquistain</td>
				<td><img src="../img/2.jpg" id="ander_arg" alt="Ander face" height="50" width="50"></td>
				<td> Software </td>
				<td> Legorreta </td>
				<td> amadinabeitia001@ikasle.ehu.eus </td>
			</tr>
		</table>
	</center>
		<a href="../layoutR.php?eposta=<?php echo($_GET["eposta"]); ?>"> <img src="../img/atras.png" id="atzeraArgazkia" style="width: 40px;height: 40px;position: relative; top: 10px; left: 30px;"></a>
	</body>
</html>