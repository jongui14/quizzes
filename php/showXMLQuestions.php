<html>
<head></head>
<body>
<div align="right">
	<img src="
	<?php
	include 'configEzarri.php';
	$erab=$_GET["eposta"];
	$ema=$niremysqli->query("select * from users where eposta='$erab'");
	$row=$ema->fetch_object();
	$hutsa=$row->argazkia;
	if( $hutsa == '0'){
		echo '../img/hutsaGaldera.png';
	}else{
		echo 'data:image/jpeg;base64,'.base64_encode( $row->argazkia );
	}
	?>" id="profilekoArgazkia" style="width: 40px;height: 40px;position: relative;">
	<br><?php echo($_GET["eposta"]); ?>
	</div>
	
	<?php
$xml = simplexml_load_file('../xml/questions.xml');
?>
<table>
  <thead>
    <tr>
      <th>Enuntziatua</th>
      <th>Zailtasuna</th>
      <th>Gaia</th>
    </tr>
  </thead>
  <tbody>

<?php foreach ($xml->assessmentItem as $assessmentItem) :?>
    <tr>
      <td><?php echo $assessmentItem->complexity; ?></td>
      <td><?php echo $assessmentItem->complexity; ?></td>
      <td><?php echo $assessmentItem->subject; ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
	

</body>
</html>

<?php

//$file = file_get_contents('../xml/questions.xml');
//echo $file;

?>